<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Functions\Core;
use App\Functions\Mail as Mailer;
use App\Models\Blog;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Mail\Mailables\Address;

class GuestController extends Controller
{
    public function index_view()
    {
        $cars = Car::with('Category', 'Images')->where('status', Core::statusList()[0])->where('promote', true)->get();

        $blogs = Blog::latest()->inRandomOrder()->limit(4)->get();

        $json = [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => env('COMPANY_NAME'),
            'url' => url(route('views.guest.index'), secure: true),
            'logo' => asset('img/logo.webp'),
            'image' => asset('img/bg-cover.webp'),
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => Core::getSetting('contact_phone'),
                'contactType' => 'Customer Service',
                'email' => Core::getSetting('contact_email'),
                'areaServed' => 'MA',
                'availableLanguage' => ['English', 'French', 'Italian', 'Spanish']
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => env('MAP_CONTACT_ADDRESS'),
                'addressLocality' => 'Marrakech',
                'postalCode' => '40000',
                'addressCountry' => 'MA'
            ],
            'openingHours' => [
                'Mo-Fr 09:00-23:00',
                'Sa-Su 11:00-18:00'
            ],
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => url(route('views.guest.fleet') . '?location={location}&pick-up-date={pick_up_date}&drop-off-date={drop_off_date}&pick-up-time={pick_up_time}&drop-off-time={drop_off_time}', secure: true),
                'query-input' => [
                    'name=location',
                    'name=pick_up_date',
                    'name=drop_off_date',
                    'name=pick_up_time',
                    'name=drop_off_time'
                ]
            ],
            'description' => Core::subString(__(':company offers fast and easy car rental services with features like free replacement, free cancellation, all-risk coverage, no hidden fees, and 24/7 support. Choose from a wide range of well-maintained vehicles at competitive prices, with convenient pick-up and drop-off locations. Ideal for travelers in Marrakech and beyond, ensuring reliable and affordable transportation for all your travel needs.', ['company' => env('COMPANY_NAME')])),
        ];

        if (Core::getSetting('social', 'group')) {
            $json['sameAs'] = array_filter([
                Core::getSetting('instagram'),
                Core::getSetting('telegram'),
                Core::getSetting('facebook'),
                Core::getSetting('youtube'),
                Core::getSetting('tiktok'),
                Core::getSetting('x')
            ]);
        }

        if ($cars->count()) {
            $json['makesOffer'] = $cars->map(function ($car) {
                return [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Car',
                        'name' => ucwords($car->name) . ' (' . ucwords(__('or similar')) . ')',
                        'vehicleConfiguration' => implode(', ', [
                            $car->passengers . ' ' . __('Passengers'),
                            $car->doors . ' ' . __('Doors'),
                            $car->cargo . ' ' . __('sutecase'),
                            __(ucwords($car->transmission)),
                            __(ucwords($car->fuel))
                        ]),
                        'url' => route('views.guest.show', $car->slug),
                        'image' => $car->Images[0]->Link,
                        'aggregateRating' => [
                            '@type' => 'AggregateRating',
                            'ratingValue' => (string) $car->rating,
                            'bestRating' => '5',
                            'worstRating' => '1',
                            'reviewCount' => (string) $car->Reviews->where('status', 'approved')->count()
                        ]
                    ],
                    'priceCurrency' => Core::$CURRENCY,
                    'price' => number_format($car->price / Core::rate(), 2),
                    'priceValidUntil' => now(),
                    'availability' => 'http://schema.org/InStock',
                    'validFrom' => now(),
                    'eligibleDuration' => [
                        '@type' => 'QuantitativeValue',
                        'value' => 1,
                        'unitCode' => 'DAY'
                    ]
                ];
            });
        }

        return view('guest.index', compact('json', 'cars', 'blogs'));
    }

    public function fleet_view(Request $Request)
    {
        $cars = Car::with('Category', 'Images');

        $cars->when($Request->transmission, function ($query, $transmission) {
            return $query->whereIn('transmission', $transmission);
        })->when($Request->passengers, function ($query, $passengers) {
            return $query->where('passengers', '>=', $passengers);
        })->when($Request->cargo, function ($query, $cargo) {
            return $query->where('cargo', '>=', $cargo);
        })->when($Request->type, function ($query, $type) {
            return $query->whereIn('category', $type);
        })->when($Request->brand, function ($query, $brand) {
            return $query->whereIn('brand', $brand);
        })->when($Request->min, function ($query, $min) {
            return $query->where('price', '>=', (float) $min * Core::rate());
        })->when($Request->max, function ($query, $max) {
            return $query->where('price', '<=', (float) $max * Core::rate());
        })->when($Request->fuel, function ($query, $fuel) {
            return $query->whereIn('fuel', $fuel);
        });

        $cars = $cars->cursorPaginate(50);

        $types = Category::select('id', 'name_' . Core::lang())->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->{'name_' . Core::lang()},
            ];
        });
        $brands = Brand::select('id', 'name_' . Core::lang())->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->{'name_' . Core::lang()},
            ];
        });

        $json = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'url' =>  url(route('views.guest.fleet'), secure: true),
            'numberOfItems' => $cars->count(),
            'potentialAction' => [
                [
                    '@type' => 'SearchAction',
                    'target' => url(route('views.guest.fleet') . '?location={location}&pick-up-date={pick_up_date}&drop-off-date={drop_off_date}&pick-up-time={pick_up_time}&drop-off-time={drop_off_time}', secure: true),
                    'query-input' => [
                        'name=location',
                        'name=pick_up_date',
                        'name=drop_off_date',
                        'name=pick_up_time',
                        'name=drop_off_time'
                    ]
                ],
                [
                    '@type' => 'SearchAction',
                    'target' => url(route('views.guest.fleet') . '?price={price}&passangers={passangers}&cargo={cargo}&fuel[]={fuel}&transmission[]={transmission}&type[]={transmission}&brand[]={brand}', secure: true),
                    'query-input' => [
                        'name=price',
                        'name=passangers',
                        'name=cargo',
                        'name=fuel',
                        'name=transmission',
                        'name=type',
                        'name=brand',
                    ]
                ],
            ],
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => __('Home'),
                        'item' => url(route('views.guest.index'), secure: true)
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => __('Fleet'),
                        'item' => url(route('views.guest.fleet'), secure: true)
                    ]
                ]
            ]
        ];

        if ($cars->count()) {
            $json['itemListElement'] = $cars->map(function ($car, $i) {
                return [
                    '@type' => 'ListItem',
                    'position' => $i + 1,
                    'item' => [
                        '@type' => 'Car',
                        'name' => ucwords($car->name) . ' (' . ucwords(__('or similar')) . ')',
                        'offers' => [
                            '@type' => 'Offer',
                            'url' => route('views.guest.show', $car->slug),
                            'priceCurrency' => Core::$CURRENCY,
                            'price' => number_format($car->price / Core::rate(), 2),
                            'priceValidUntil' => now(),
                            'availability' => 'http://schema.org/InStock',
                            'validFrom' => now(),
                            'eligibleDuration' => [
                                '@type' => 'QuantitativeValue',
                                'value' => 1,
                                'unitCode' => 'DAY'
                            ]
                        ],
                        'vehicleConfiguration' => implode(', ', [
                            $car->passengers . ' ' . __('Passengers'),
                            $car->doors . ' ' . __('Doors'),
                            $car->cargo . ' ' . __('sutecase'),
                            __(ucwords($car->transmission)),
                            __(ucwords($car->fuel))
                        ]),
                        'image' => $car->Images[0]->Link,
                        'aggregateRating' => [
                            '@type' => 'AggregateRating',
                            'ratingValue' => (string) $car->rating,
                            'bestRating' => '5',
                            'worstRating' => '1',
                            'reviewCount' => (string) $car->Reviews->where('status', 'approved')->count()
                        ],
                        'itemCondition' => 'https://schema.org/NewCondition',
                        'vehicleModelDate' => '2024',
                        'brand' => [
                            '@type' => 'Brand',
                            'name' => $car->Brand->name
                        ],
                        'model' => $car->Category->name,
                        'numberOfDoors' => $car->doors,
                        'driveWheelConfiguration' => 'Front-wheel drive',
                        'vehicleSeatingCapacity' =>  $car->passengers,
                        'vehicleTransmission' => ucwords($car->transmission),
                        'vehicleIdentificationNumber' => Str::random(17),
                        'vehicleEngine' => [
                            '@type' => 'EngineSpecification',
                            'fuelType' => ucwords($car->fuel)
                        ]
                    ]
                ];
            });
        }

        return view('guest.fleet', compact('json', 'cars', 'types', 'brands'));
    }

    public function blogs_view()
    {
        $blogs = Blog::with('Image')->cursorPaginate(50);

        $json = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'url' =>  url(route('views.guest.blogs'), secure: true),
            'numberOfItems' => $blogs->count(),
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => __('Home'),
                        'item' => url(route('views.guest.index'), secure: true)
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => __('Blogs'),
                        'item' => url(route('views.guest.blogs'), secure: true)
                    ]
                ]
            ]
        ];

        if ($blogs->count()) {
            $json['itemListElement'] = $blogs->map(function ($blog, $i) {
                return [
                    '@type' => 'ListItem',
                    'position' => $i + 1,
                    'item' => [
                        '@type' => 'BlogPosting',
                        'headline' => ucwords($blog->title),
                        'datePublished' => $blog->updated_at,
                        'author' => [
                            '@type' => 'Person',
                            'name' => env('COMPANY_NAME')
                        ],
                        'url' => url(route('views.guest.blog', $blog->slug), secure: true),
                        'image' => $blog->Image->Link,
                        'description' => Core::subString($blog->details ?? __('Your gateway to expert insights and captivating stories on :blog. Explore, learn, and engage with our curated content designed to inform and inspire.', ['blog' => $blog->title]))
                    ]
                ];
            });
        }

        return view('guest.blogs', compact('json', 'blogs'));
    }

    public function show_view($slug)
    {
        $car = Car::with('Category', 'Brand', 'Images', 'Reviews')->where('slug', $slug)->limit(1)->first();
        if (!$car) abort(404);

        $Reviews = $car->Reviews->where('status', 'approved');
        $json = [
            '@context' => 'https://schema.org',
            '@type' => 'Car',
            'name' => ucwords($car->name) . ' (' . ucwords(__('or similar')) . ')',
            'offers' => [
                '@type' => 'Offer',
                'url' => route('views.guest.show', $car->slug),
                'priceCurrency' => Core::$CURRENCY,
                'price' => number_format($car->price / Core::rate(), 2),
                'priceValidUntil' => now(),
                'availability' => 'http://schema.org/InStock',
                'validFrom' => now(),
                'eligibleDuration' => [
                    '@type' => 'QuantitativeValue',
                    'value' => 1,
                    'unitCode' => 'DAY'
                ]
            ],
            'vehicleConfiguration' => implode(', ', [
                $car->passengers . ' ' . __('Passengers'),
                $car->doors . ' ' . __('Doors'),
                $car->cargo . ' ' . __('sutecase'),
                __(ucwords($car->transmission)),
                __(ucwords($car->fuel))
            ]),
            'image' => $car->Images[0]->Link,
            'url' => route('views.guest.show', $car->slug),
            'description' => Core::subString($car->details ?? __('Introducing the :car, where elegance meets power. Experience unmatched performance, luxurious comfort, and state-of-the-art technology in every journey. Discover driving redefined with :brand.', ['car' => $car->name, 'brand' => $car->Brand->name])),
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => (string) $car->rating,
                'bestRating' => '5',
                'worstRating' => '1',
                'reviewCount' => (string) $car->Reviews->where('status', 'approved')->count()
            ],
            'itemCondition' => 'https://schema.org/NewCondition',
            'vehicleModelDate' => '2024',
            'brand' => [
                '@type' => 'Brand',
                'name' => $car->Brand->name
            ],
            'model' => $car->Category->name,
            'numberOfDoors' => $car->doors,
            'driveWheelConfiguration' => 'Front-wheel drive',
            'vehicleSeatingCapacity' =>  $car->passengers,
            'vehicleTransmission' => ucwords($car->transmission),
            'vehicleIdentificationNumber' => Str::random(17),
            'vehicleEngine' => [
                '@type' => 'EngineSpecification',
                'fuelType' => ucwords($car->fuel)
            ],
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => __('Home'),
                        'item' => url(route('views.guest.index'), secure: true)
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => __('Fleet'),
                        'item' => url(route('views.guest.fleet'), secure: true)
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'name' => ucwords($car->name),
                        'item' => url(route('views.guest.show', $car->slug), secure: true)
                    ]
                ]
            ],
            'potentialAction' => [
                [
                    '@type' => 'ReserveAction',
                    'target' => [
                        '@type' => 'EntryPoint',
                        'urlTemplate' => url(route('actions.guest.reserve'), secure: true),
                        'httpMethod' => 'POST',
                        'encodingType' => 'application/x-www-form-urlencoded'
                    ]
                ],
                [
                    '@type' => 'WriteAction',
                    'target' => [
                        '@type' => 'EntryPoint',
                        'urlTemplate' => url(route('actions.guest.review', $car->id), secure: true),
                        'httpMethod' => 'POST',
                        'encodingType' => 'application/x-www-form-urlencoded'
                    ]
                ]
            ]
        ];

        if ($Reviews->count()) {
            $json['review'] = $Reviews->map(function ($review) {
                return [
                    '@type' => 'Review',
                    'reviewRating' => [
                        '@type' => 'Rating',
                        'ratingValue' => (string) $review->rate,
                        'bestRating' => '5',
                        'worstRating' => '1'
                    ],
                    'author' => [
                        '@type' => 'Person',
                        'name' => ucwords($review->name)
                    ],
                    'datePublished' => $review->updated_at,
                    'reviewBody' => $review->content
                ];
            });
        }

        return view('guest.show', compact('json', 'car'));
    }

    public function blog_view($slug)
    {
        $blog = Blog::with('Image')->where('slug', $slug)->limit(1)->first();
        if (!$blog) abort(404);
        $json = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => ucwords($blog->title),
            'datePublished' => $blog->updated_at,
            'author' => [
                '@type' => 'Person',
                'name' => env('COMPANY_NAME')
            ],
            'url' => url(route('views.guest.blog', $blog->slug), secure: true),
            'image' => $blog->Image->Link,
            'description' => Core::subString($blog->details ?? __('Your gateway to expert insights and captivating stories on :blog. Explore, learn, and engage with our curated content designed to inform and inspire.', ['blog' => $blog->title])),
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => url(route('views.guest.blog', $blog->slug), secure: true)
            ],
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => __('Home'),
                        'item' => url(route('views.guest.index'), secure: true)
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => __('Blogs'),
                        'item' => url(route('views.guest.blogs'), secure: true)
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'name' => ucwords($blog->title),
                        'item' => url(route('views.guest.blog', $blog->slug), secure: true)
                    ]
                ]
            ],
        ];

        return view('guest.blog', compact('json', 'blog'));
    }

    public function about_view()
    {
        $reviews = Review::inRandomOrder()->limit(10)->get();
        $json = [
            '@context' => 'https://schema.org',
            '@type' => 'AboutPage',
            'mainEntity' => [
                '@type' => 'Organization',
                'name' => env('COMPANY_NAME'),
                'url' => url(route('views.guest.index'), secure: true),
                'contactPoint' => [
                    '@type' => 'ContactPoint',
                    'telephone' => Core::getSetting('contact_phone'),
                    'contactType' => 'Customer Service',
                    'email' => Core::getSetting('contact_email'),
                    'areaServed' => 'MA',
                    'availableLanguage' => ['English', 'French', 'Italian', 'Spanish']
                ],
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => env('MAP_CONTACT_ADDRESS'),
                    'addressLocality' => 'Marrakech',
                    'postalCode' => '40000',
                    'addressCountry' => 'MA'
                ],
                'description' => Core::subString(__('Learn more about :company, a leading car rental company in Morocco, committed to hassle-free bookings and exceptional customer service. With a diverse fleet of the latest models, :company guarantees your car will be ready before your arrival. Enjoy 24/7 personalized assistance to enhance your travel experience.', ['company' => env('COMPANY_NAME')])),
                'image' => asset('img/logo.webp'),
            ],
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => __('Home'),
                        'item' => url(route('views.guest.index'), secure: true)
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => __('About Us'),
                        'item' => url(route('views.guest.about'), secure: true)
                    ],
                ]
            ],
        ];

        if (Core::getSetting('social', 'group')) {
            $json['mainEntity']['sameAs'] = array_filter([
                Core::getSetting('instagram'),
                Core::getSetting('telegram'),
                Core::getSetting('facebook'),
                Core::getSetting('youtube'),
                Core::getSetting('tiktok'),
                Core::getSetting('x')
            ]);
        }

        return view('guest.about', compact('json', 'reviews'));
    }

    public function faqs_view()
    {
        $data = [
            'title' => __('FAQ'),
            'link' => route('views.guest.faqs'),
            'desc' => Core::subString(__('Find answers to common questions about booking, rental requirements, cancellation policies, delivery, drop-off, refueling, and special requests at :company. Get all the details you need for a smooth and hassle-free car rental experience.', ['company' => env('COMPANY_NAME')])),
            'tabs' => [
                [
                    'title' => __('I need to rent a car, how can I book my vehicle?'),
                    'content' => __('Our booking process is simple and straight to the point, select the pick up and drop off date, select the delivery location, right after that, choose a car that responds best to your needs, add your info, and in few seconds you will receive a reservation confirmation email and one of our assistants will reach out to you as soon as possible.')
                ],
                [
                    'title' => __('What are your requirements to make accept my reservation?'),
                    'content' => [
                        '- ' . __('Valide driven licence.'),
                        '- ' . __('Valid form of identification.'),
                        '- ' . __('Must be 21 years of age or older.'),
                    ]
                ],
                [
                    'title' => __('What is your cancellation policy?'),
                    'content' => __('Cancellation is free up to 72 hours prior to your pickup date is FREE OF CHARGE, after that a fee of :price will be charged to your card.', ['price' => number_format(200 / Core::rate(), 2) . Core::$CURRENCY])
                ], [
                    'title' => __('Where do you deliver?'),
                    'content' => __('We deliver everywhere in Morroco, inside of Marrakech city delivery is free, and for deliveries in other cities you need to cover the charges for gas that will sufficient to deliver the car to you, highway and transportation fee of the assistant that will take care of the delivery.')
                ], [
                    'title' => __('Where can I make the drop off?'),
                    'content' => __('Same as our delivery policy, our team will pick up the car anywhere in Marrakech free of charge. However, if the drop off location is in a different city you will need to cover gas and transportation to bring the car from the city where you would like to drop it off.')
                ], [
                    'title' => __('When i return the car do i need to clean or refuel it?'),
                    'content' => [
                        __('Refueling policy: you need to return the car with the same fuel level it had when you first picked it up (it will be mentioned in your renting contract)'),
                        __('Cleaning policy: We are not responsible if you lose any of your belongings in the car, so make sure you double check that you took everything before you drop the car off. If you return the car clean, no extra fees will be paid, otherwise a :price pay to clean up the car.', ['price' => number_format(100 / Core::rate(), 2) . Core::$CURRENCY])
                    ]
                ], [
                    'title' => __('If I have an event and i would like to decorate the car, can you take care of it?'),
                    'content' => __('For car decoration and special requests, please make sure to mention it to our team members that will reach out to make it happen.')
                ],
            ]
        ];

        $data['json'] = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($data['tabs'])->map(function ($tab) {
                return [
                    '@type' => 'Question',
                    'name' => $tab['title'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => is_array($tab['content']) ? implode(' ', $tab['content']) : $tab['content']
                    ]
                ];
            }),
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => __('Home'),
                        'item' => url(route('views.guest.index'), secure: true)
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => __('FAQ'),
                        'item' => url(route('views.guest.faqs'), secure: true)
                    ],
                ]
            ],
        ];
        return view('guest.info', compact('data'));
    }

    public function terms_view()
    {
        $json = [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => url(route('views.guest.terms'), secure: true),
            ],
            'headline' => __('Terms And Conditions'),
            'description' => Core::subString(__('Understand :company terms and conditions for car rental services. Review our guidelines, policies, and customer responsibilities for a transparent and reliable rental experience.', ['company' => env('COMPANY_NAME')])),
            'articleBody' =>  __('Obligations of the contract holder and authorised drivers with respect to the rented vehicleThe contract holder is directly and jointly responsible for ensuring that the main driver and any additional drivers authorised to drive the rented vehicle comply with the contractual obligations described below.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]),
            'datePublished' => '2024-07-04',
            'dateModified' => '2024-07-04',
            'author' => [
                '@type' => 'Organization',
                'name' => env('COMPANY_NAME')
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => env('COMPANY_NAME'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('img/logo.webp')
                ]
            ],
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => __('Home'),
                        'item' => url(route('views.guest.index'), secure: true)
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' =>  __('Terms And Conditions'),
                        'item' => url(route('views.guest.terms'), secure: true)
                    ],
                ]
            ],
        ];
        return view('guest.term', compact('json'));
    }

    public function privacy_view()
    {
        $data = [
            'title' => __('Privacy Policy'),
            'link' => route('views.guest.privacy'),
            'desc' => Core::subString(__('Review :company Privacy Policy to understand how we collect, use, and protect your personal and payment information. Learn about data security measures and your rights regarding privacy updates.', ['company' => env('COMPANY_NAME')])),
            'tabs' => [
                [
                    'title' => __('Personal Identification Information'),
                    'content' => __('This may include your name, email address, phone number, postal address, and other similar information.')
                ], [
                    'title' => __('Payment Information'),
                    'content' => __('If you make a reservation or payment through our website, we may collect payment information such as credit card details, billing address, and other financial information necessary to process your transaction securely.')
                ], [
                    'title' => __('Vehicle Preferences and Rental History'),
                    'content' => __('We may collect information about your vehicle preferences, rental history, and other details related to your interactions with our services.')
                ], [
                    'title' => __('Data Security'),
                    'content' => __('We take the security of your personal information seriously and employ appropriate technical and organizational measures to protect it against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.')
                ], [
                    'title' => __('Updates to Privacy Policy'),
                    'content' => __('We reserve the right to update this Privacy Policy at any time to reflect changes in our practices or legal requirements. We encourage you to review this Privacy Policy periodically for any updates. Your continued use of our website or services after any changes indicates your acceptance of the updated Privacy Policy.')
                ],
            ],
            'json' => [
                '@context' => 'https://schema.org',
                '@type' => 'Article',
                'mainEntityOfPage' => [
                    '@type' => 'WebPage',
                    '@id' => url(route('views.guest.privacy'), secure: true),
                ],
                'headline' => __('Privacy Policy'),
                'description' => Core::subString(__('Review :company Privacy Policy to understand how we collect, use, and protect your personal and payment information. Learn about data security measures and your rights regarding privacy updates.', ['company' => env('COMPANY_NAME')])),
                'datePublished' => '2024-07-04',
                'dateModified' => '2024-07-04',
                'author' => [
                    '@type' => 'Organization',
                    'name' => env('COMPANY_NAME')
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => env('COMPANY_NAME'),
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => asset('img/logo.webp')
                    ]
                ],
                'breadcrumb' => [
                    '@type' => 'BreadcrumbList',
                    'itemListElement' => [
                        [
                            '@type' => 'ListItem',
                            'position' => 1,
                            'name' => __('Home'),
                            'item' => url(route('views.guest.index'), secure: true)
                        ],
                        [
                            '@type' => 'ListItem',
                            'position' => 2,
                            'name' =>  __('Privacy Policy'),
                            'item' => url(route('views.guest.privacy'), secure: true)
                        ],
                    ]
                ],
            ]
        ];
        return view('guest.info', compact('data'));
    }

    public function reserve_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'location' => ['required', 'string'],
            'from_date' => ['required', 'date', 'after_or_equal:today'],
            'to_date' => ['required', 'date', 'after:from_date'],
            'from_time' => ['required', 'string'],
            'to_time' => ['required', 'string'],
            'car' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Car = Car::findorfail($Request->car);
        $from = Carbon::parse($Request->from_date . ' ' . $Request->from_time);
        $to = Carbon::parse($Request->to_date . ' ' . $Request->to_time);
        $period = (int) ceil($from->diffInHours($to) / 24);
        $total = $period * $Car->price;

        $Reservation = Reservation::create($Request->merge([
            'from' => $from,
            'to' => $to,
            'period' => $period,
            'total' => $total,
            'status' => 'pendding',
            'charges' => json_encode(['total' => 0, 'items' => []])
        ])->all());

        Mailer::plain([
            'subject' => __('New Reservation Available'),
            'from' => new Address(env('MAIL_NOREPLAY_ADDRESS'), env('COMPANY_NAME')),
            'to' => [new Address(Core::getSetting('notify_email'), env('COMPANY_NAME'))],
            'content' => __('New Reservation Available'),
        ]);

        Mailer::reserve([
            'from' => new Address(Core::getSetting('contact_email'), env('COMPANY_NAME')),
            'to' => [new Address($Request->email, $Request->name)],
            'resreve' => $Reservation
        ]);

        return Redirect::back()->with([
            'content' => __('Reservation completed successfully'),
            'modal' => true
        ]);
    }

    public function review_action(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'content' => ['required', 'string'],
            'rate' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Review::create($Request->merge([
            'car' => $id,
            'status' => 'pendding'
        ])->all());

        return Redirect::back()->with([
            'content' => __('Feedback created successfully'),
            'modal' => true
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Functions\Core;
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

class GuestController extends Controller
{
    public function index_view()
    {
        $cars = Car::with('Category', 'Images')->joinSub(
            Car::select(DB::raw('MAX(id) as id'))->whereIn(
                'category',
                Category::inRandomOrder()->limit(10)->pluck('id')
            )->where('status', Core::statusList()[0])->where('promote', true)->groupBy('category'),
            'sub',
            function ($join) {
                $join->on('cars.id', '=', 'sub.id');
            }
        )->get();

        $blogs = Blog::latest()->inRandomOrder()->limit(4)->get();

        return view('guest.index', compact('cars', 'blogs'));
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
            return $query->where('price', '>=', $min);
        })->when($Request->max, function ($query, $max) {
            return $query->where('price', '<=', $max);
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
        return view('guest.fleet', compact('cars', 'types', 'brands'));
    }

    public function blogs_view()
    {
        $blogs = Blog::with('Image')->cursorPaginate(50);
        return view('guest.blogs', compact('blogs'));
    }

    public function show_view($slug)
    {
        $car = Car::with('Category', 'Brand', 'Images', 'Reviews')->where('slug', $slug)->limit(1)->first();
        if (!$car) abort(404);
        return view('guest.show', compact('car'));
    }

    public function blog_view($slug)
    {
        $blog = Blog::with('Image')->where('slug', $slug)->limit(1)->first();
        if (!$blog) abort(404);
        return view('guest.blog', compact('blog'));
    }

    public function about_view()
    {
        $reviews = Review::inRandomOrder()->limit(10)->get();
        return view('guest.about', compact('reviews'));
    }

    public function faqs_view()
    {
        $data = [
            'title' => __('FAQ'),
            'link' => route('views.guest.faqs'),
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
        return view('guest.info', compact('data'));
    }

    public function terms_view()
    {
        $data = [
            'title' => __('Terms And Conditions'),
            'link' => route('views.guest.terms'),
            'tabs' => []
        ];
        return view('guest.info', compact('data'));
    }

    public function privacy_view()
    {
        $data = [
            'title' => __('Privacy Policy'),
            'link' => route('views.guest.privacy'),
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

        Reservation::create($Request->merge([
            'from' => $from,
            'to' => $to,
            'period' => $period,
            'total' => $total,
            'status' => 'pendding',
            'charges' => json_encode(['total' => 0, 'items' => []])
        ])->all());

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

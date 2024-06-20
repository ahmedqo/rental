@extends('shared.guest.base')
@section('title', __('Terms And Conditions'))

@section('seo')
    <meta name="description" content="{{ Core::subString('') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ env('COMPANY_NAME') }}">
    <meta property="og:title" content="{{ env('COMPANY_NAME') }} {{ __('Terms And Conditions') }} Page">
    <meta property="og:description" content="{{ Core::subString('') }}">
    <meta property="og:image" content="{{ url(asset('img/logo.webp'), secure: true) }}?v={{ env('APP_VERSION') }}">
    <meta property="og:url" content="{{ url(url()->full(), secure: true) }}">
    @if (Core::getSetting('x'))
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="{{ Core::getSetting('x') }}">
        <meta name="twitter:title" content="{{ env('COMPANY_NAME') }} {{ __('Terms And Conditions') }} Page">
        <meta name="twitter:description" content="{{ Core::subString('') }}">
        <meta name="twitter:image" content="{{ url(asset('img/logo.webp'), secure: true) }}?v={{ env('APP_VERSION') }}">
    @endif
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Article",
            "headline": "{{ __('Terms And Conditions') }}",
            "author": {
                "@type": "Organization",
                "name": "{{ env('COMPANY_NAME') }}"
            },
            "publisher": {
                "@type": "Organization",
                "name": "{{ env('COMPANY_NAME') }}",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ url(asset('img/logo.webp'), secure: true) }}?v={{ env('APP_VERSION') }}"
                }
            },
            "datePublished": "2024-01-01",
            "dateModified": "2024-01-01",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "{{ url(route('views.guest.terms'), secure: true) }}"
            },
            "articleBody": "{{ Core::subString('') }}",
            "breadcrumb": {
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem", 
                    "position": 1, 
                    "item": { 
                        "@id": "{{ url(route('views.guest.index'), secure: true) }}", 
                        "name": "{{ __('Home') }}"
                    }
                }, {
                    "@type": "ListItem", 
                    "position": 2, 
                    "item": { 
                        "@id": "{{ url(route('views.guest.terms'), secure: true) }}", 
                        "name": "{{ __('Terms And Conditions') }}"
                    }
                }]
            }
        }
    </script>
@endsection

@section('content')
    <section>
        <hr class="border-t border-t-x-shade">
        <div class="w-full mx-auto container py-2">
            @include('shared.guest.crumbs', [
                'items' => [
                    [__('Home'), route('views.guest.index')],
                    [__('Terms And Conditions'), route('views.guest.terms')],
                ],
            ])
        </div>
        <hr class="border-t border-t-x-shade">
    </section>
    <section class="bg-x-acent bg-opacity-10 bg-repeat"
        style="background-image: url({{ asset('img/pattern-2.png') }}?v={{ env('APP_VERSION') }})">
        <div class="w-full mx-auto my-8 lg:my-16 lg:max-w-[50%] container p-4 flex flex-col items-center gap-6">
            <h1 class="text-x-black font-x-huge text-2xl lg:text-5xl text-center">{{ __('Terms And Condition') }}</h1>
            <neo-explorer label="{{ __('Search') }}" target=".find" class="bg-white w-full"></neo-explorer>
        </div>
    </section>
    <section class="my-4 lg:my-6">
        <div class="w-full mx-auto container p-4">
            <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-10">
                <div class="w-full lg:col-span-2 flex flex-col gap-6">
                    <p class="find text-x-black text-base font-normal">
                        {{ __('Obligations of the contract holder and authorised drivers with respect to the rented vehicleThe contract holder is directly and jointly responsible for ensuring that the main driver and any additional drivers authorised to drive the rented vehicle comply with the contractual obligations described below.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                    </p>
                    <p class="find text-x-black text-base font-normal">
                        {{ __('In the event that :company considers that any of the following obligations are being violated, :company reserves the right to take the appropriate legal actions, such as removing the rented vehicle from the driver of the vehicle and/or judicially requiring the return of the rented vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                    </p>
                    <div class="tabs find w-full flex flex-col is-open">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Obligations of the Contract Holder and Authorised Drivers at the time of collection', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The rental invoice will be made in the name of the contract holder and once the contract has been issued, it is no longer possible to modify it. To request an invoice in the name of the company, you must contact before making the rental contract.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Check the vehicle before moving it from the delivery location and inform :company of any discrepancies with respect to the condition of the vehicle reflected in the verification of damage section. Discrepancy both at the level of the list of accessories present in the vehicle and damage not marked or marked incorrectly in the previously signed rental contract.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If necessary, take care of the assembly of the child seats or any other extra that requires assembly. :company will not, under any circumstances, assume responsibility for the installation of accessories in the rented vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Obligations of the Contract Holder and Authorised Drivers during RentalUse the rented vehicle respecting the following conditions of use:', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Alert :company to any sign of technical failure in the rented vehicle: fluid levels (oil, water), tire pressure, etc.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('In the event of an accident/claim, breakdown or mechanical failure, regardless of the coverage contracted, follow the procedure established by :company:', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <ul class="w-full flex flex-col gap-2 ps-10 list-decimal">
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('do not repair the vehicle without prior authorization from :company.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Not requesting a roadside assistance service without prior authorization from :company.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Do not leave the rented vehicle without the necessary measures to protect it and remain with it until the arrival of the towing service.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Notify :company within a maximum period of 24 hours of any damage (with or without a third party) that has been caused to the rented vehicle. :company will assess the situation and study the most effective solution: the driver may be advised to drive to the a specific location to obtain a replacement vehicle, the rented vehicle can be assisted at the scene of the incident or, in case of not being able to repair the vehicle on site, or a tow truck will be sent to tow the rented vehicle to the nearest :company office and a replacement vehicle will be provided to the contract holder.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('In addition, only in the event of damage, the driver must duly fill in an accident or damage report, deliver it to the :company office at the time of return of the rented vehicle and send a copy of the report to the e-mail address :email In the accident report, you must state the circumstances, place, date and time of the incident, possible witnesses and full contact details of any third party involvement.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                        </ul>
                                        <p>{{ __('If the accident report is not duly completed or in case of negligence on the part of the customer, :company reserves the right not to deliver a replacement vehicle.In addition, the coverage may be invalidated.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __(':company will process accident reports, guide the driver on how to act and advise them in the event of injuries and/or court summonses. :company will charge the contract holder an amount of :price for this claims management, damage processing and advice (DAF) service.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(500 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('In the event of theft or theft of the rented vehicle, regardless of the coverage contracted, follow the procedure established by :company:', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <ul class="w-full flex flex-col gap-2 ps-10 list-decimal">
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Immediately inform the relevant authorities and file a police report, obtaining the corresponding signed police report. If this document is not submitted to :company, the coverage may be invalidated.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Notify :company of the theft or theft of the rented vehicle within a maximum period of 24 hours.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Hand over the keys to the rented vehicle to :company within a maximum of 24 hours. If the contract holder does not hand over the keys, they will be responsible for paying :company the value of the total excess of the vehicle. This clause will only cease to apply in the event that, in the police report, it is reflected that the keys to the vehicle were stolen.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Respect the rules of the Highway Code. Respect the speed limits established for each type of vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('The customer is responsible for the proper driving of the rented vehicle in accordance with Moroccan law. Any damage that may be caused to the rented vehicle as a result of driving the vehicle in the opposite lane will be considered negligence, the contracted coverage will be invalidated and the contract holder will be responsible for all expenses generated.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Have sufficient knowledge for the proper driving of the rented vehicle. The customer is responsible for the knowledge and proper handling of the rented vehicle, especially with regard to the operation of the gearbox. Any damage that may be caused to the vehicle as a result of an error in the gearbox will be considered negligence, the contracted coverage will be invalidated and the contract holder will be responsible for all expenses generated', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('According to current regulations, parking on roads and public areas that are determined of vehicles intended for rental without a driver is prohibited when they do not have a rental contract in force. Vehicles intended for self-drive rental that are rented and parked must be visibly identified with the contract number, duration of the contract, start and end dates, vehicle registration number and the name, address and telephone number of the rental company. In the event that the tenant parks on public roads and does not leave this document visible, :company will not be responsible for any penalty for this reason.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __(':company will not assume the repair of the following breakdowns or damages or the compensation that may correspond: those produced as a result of negligence or inappropriate use by the drivers of the vehicles, not closing the hood properly and those derived from not having complied with the instructions for use and maintenance set out by the manufacturer in the instruction manual of each vehicle, in particular breakdowns that occur as a result of continuing to drive when the oil pressure, temperature or brake indicators indicate faults in the operation of the systems or those resulting from failure to pay attention to the indications of failure on the control panels, warning lights and alarms, the change of tyres due to acts of vandalism or negligence of the driver or any other person for whom he or she is responsible, Breakdowns caused by the absence of cleaning in vehicles when they are used in areas with mud or similar. Likewise, :company will not have the obligation to bear the costs of repairs to the vehicles, or the corresponding compensation, in the following cases: damage caused by the commission of intentional crimes, damage caused while driving the vehicle by people who lack the appropriate driving licence or have broken a sentence that involves its removal or suspension, in an accident, if the driver of the vehicle causing the accident is convicted in a final judgment for the crime of omission of the duty to help, damage caused inside port or airport areas and all those arising from the breach of the obligations of the contract.',['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Obligations of the Contract Holder and Authorised Drivers at the time of return of the rented vehicle', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Return the rented vehicle with its corresponding keys, accessories and extras in the same state of operation and cleanliness in which it was delivered. In the event that the contract holder returns the rented vehicle in conditions other than those specified by :company at the time of collection in the section of the contract \'Information and damage verification annex\', the contract holder will be responsible for the alterations produced and for the missing documentation and accessories may incur additional expenses arising from non-compliance with the contractual conditions', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <ul class="w-full flex flex-col gap-2 ps-10 list-decimal">
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('If the contract holder has taken out cover with their bank card provider or a third party, :company will charge the corresponding amount up to the excess limit on the contract holder\'s bank card provided at the time of rental payment and the contract holder will be responsible for claiming this amount from their bank card provider or third parties.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Ask the :company staff to check the condition of the rented vehicle and sign the \'Return\' section of the \'Damage Information and Verification Addendum\' of the contract as proof of acceptance of the condition of the vehicle upon return. If you do not request the :company staff to inspect the vehicle upon return, you will be giving your consent for the inspection to be carried out in your absence.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Return the rented vehicle within office hours.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('If the contract holder returns the vehicle after hours, they must comply with :company\'s instructions for the return after hours.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('Returns outside office hours are understood to be those that take place outside the business hours 09AM to 11PM In this case, it will not be necessary for the contract holder to carry out any arrangements with :company\'s staff. The keys to the vehicle must be deposited in the mailbox that is located for this purpose in our car park offices.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('The contract holder will continue to be responsible for the rented vehicle until the rental office reopens. If the contract holder does not comply with the return instructions outside of office hours, they will continue to be responsible for the rented vehicle until :company can have access to it.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Return the vehicle at the agreed place, date and time. :company offers a courtesy margin of 60 minutes on the return of the rented vehicle with respect to the pick-up time of the same. However, this courtesy margin must be determined and applied at the time of making the rental agreement, when the return time is chosen.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <ul class="w-full flex flex-col gap-2 ps-10 list-decimal">
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('In the event of late return of the rented vehicle, the contracted coverage will be invalidated and :company will apply a penalty for each day of delay in the return of the vehicle. In addition to this payment, the contract holder will also be responsible for the payment of the daily rental rate.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __(':company does not offer one-way rentals. The contract holder must return the rented vehicle to the same collection location. In the event that the employee returns the rented vehicle at a different location than the one where you picked it up, :company will apply the corresponding penalty.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Check the vehicle before returning the keys and make sure that you do not forget any belongings inside. :company will not be responsible for loss of or damage to personal property left or forgotten in the vehicle during the rental period or thereafter. The contract holder is solely responsible for these goods and they will be destroyed after three months without having been removed by the lessee or authorised person. If the renter requests the return of their belongings through a courier service, they will have to bear the shipping and derivative costs, if any.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Additional obligations of the contract holder and authorised drivers whose failure to comply will invalidate the contracted coverage', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <div class="flex flex-col gap-2 text-x-black text-base font-normal">
                                    <p>{{ __('Failure to comply with any of the obligations described below will invalidate the contracted coverage, so that the contract holder will be responsible for the payment of the damage caused to the rented vehicle, the cost of the towing, the repatriation of the vehicle, the additional days of immobilization of the vehicle until its recovery according to the extra day penalty table in The Penalties Section and all expenses generated, which may reach the amount of the total excess.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                    </p>
                                    <p>{{ __('The following cases of loss of coverage and rights are expressly detailed and informed to the customer in the booking process, highlighting the key information, so that the information can be marked for acceptance.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                    </p>
                                </div>
                                <ul class="w-full flex flex-col gap-4 ps-10">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Not to drive the vehicle under the influence of alcohol, drugs or any other substance that may be inferred by driving. :company declines all liability for accident or damage to property caused by the rented vehicle if the driver was driving under the influence of alcohol, drugs or any other substance that may be inferred in driving. The simple fact of driving under the influence of any of the substances indicated will be sufficient cause for the contract holder to be liable for the damage caused, regardless of whether or not the influence of such circumstances in the accusation of the damage has been proven.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('To drive the rented vehicle only by drivers expressly authorised by :company in the rental agreement.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Not driving the vehicle outside mainland territory. On this line, it is not allowed to transport the rented vehicle by ferry or any other type of maritime transport. In the event of non-compliance with this obligation, :company will apply the corresponding penalty, the contracted coverage will be invalidated and the contract holder will be responsible for all expenses generated, including the costs of repatriating the vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Supply the rented vehicle with the appropriate type of fuel, which is indicated in the \'Vehicle details\' section of the contract and also next to the fuel tank cap of the rented vehicle. The error in the fuel will be considered as new damage and will be attributable to the contract holder.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not introduce water or agricultural diesel into the fuel tank. The presence of water or agricultural diesel in the tank will be considered negligence and will be attributable to the contract holder.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not run out of fuel and/or adblue or any other liquid necessary for the proper functioning of the vehicle. The vehicle will be delivered with a minimum level of adblue and if necessary it is the customer who is responsible for refuelling.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Not driving on unpaved, unauthorised or restricted roads.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not travel more people than the law allows for the type of vehicle rented.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not use the vehicle for public transport of people.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not use the rented vehicle for illegal activities.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Not participating with the rented vehicle in races, competitions, reliability or speed tests.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not use the vehicle for commercial purposes, to provide courier service or for the transport of goods or people.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not sublease the vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not use the vehicle to tow other vehicles.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not use the vehicle for the transport of animals.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not use the vehicle for the transport of explosives.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not use the vehicle for the transport of corrosive substances.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('No smoking inside the rented vehicle. In the event that the vehicle smells of tobacco, :company will apply a penalty to cover the costs of treatment, special cleaning and stopping of the vehicle (See point penalties).', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not park the rented vehicle in the :company spaces during the rental period.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('It is not permitted to disassemble or remove the seats from the rented vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Do not leave the lights on and do not run out of battery.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Provide an accident report in case of damage and deliver it to the :company office at the time of return of the rented vehicle and send a copy of the report to the :email email address within a maximum period of 24 hours from the time of the incident. In the accident report, you must state the circumstances, place, date and time of the incident, possible witnesses and full contact details of any third party involvement.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('In case of theft of the vehicle, immediately inform the relevant authorities and file a police report, obtaining the corresponding signed police report and return the keys to the vehicle or indicate in the report that the keys have been stolen.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Parking the vehicle without the handbrake activated or without any other safety element enabled for it.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Age requirements', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Minimum age 21 years', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The minimum age allowed to rent with :company is 21 years old.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Documentation and necessary information', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __(':company declines all liability for accident or damage to property caused by the rented vehicle if the contract holder has deliberately provided :company with inaccurate information regarding his identity, address or validity of his driving license.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Faxed or photocopied driving licences will not be accepted.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If the contract holder does not provide the documentation and information described below, :company reserves the right to refuse the rental of the vehicle', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Identity document', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The contract holder and all drivers reflected in the contract must present their valid national identity card (Moroccan residents only), passport or equivalent document as proof of identity.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If this document is not available in Roman characters, it must be accompanied by a sworn translation of it.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Faxed or photocopied documents will not be accepted. Only the original physical document will be accepted.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Driving licence', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('For rentals of four-wheeled vehicles all drivers reflected in the contract must present their Valid driving licence or one from countries adhering to international conventions type B, in force, with a minimum of one year\'s seniority.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('In the event of presenting a temporary driving authorization, if it does not indicate the age of the driving licence, the expired licence must be presented to prove it, otherwise, it will be understood that it is less than one year old and the vehicle cannot be delivered.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If you have a non-EU driving licence or from a country that is not a party to international conventions (cars only), it must be accompanied by an international driving licence in order to pick up the vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If you do not have a driving licence in Roman characters, you must present an international driving licence or accompany the driving licence with a certified translation of it.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Driving licences sent by fax or photocopied will not be accepted, only the original physical driving licence or licence in valid or digital format will be accepted.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __(':company declines all responsibility for any traffic fine imposed on the driver for lacking the license or licenses to drive the vehicle in Spain. It is the driver\'s responsibility to consult and understand the current regulations.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Addresses', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The contract holder will have to provide :company with a local address (flat, apartment, villa, hotel, etc.) as well as that of their habitual residence in their country of residence.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The addresses provided to make the rental, both the address of your usual residence and those of use of the vehicle, must be accredited if the staff requires it and may be grounds for refusal of the vehicle. Your usual address can be accredited by means of a receipt or invoice and the use of the vehicle with a confirmed reservation or also with a receipt or invoice.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Web :company rates', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Total Comfort Coverage', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Full-full fuel return system', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Express pickup', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Free cancellation up to 24 hours before', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Limited mileage Including 250 km/day and maximum of 2,500 km/rental for rentals of 10 or more days', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Our prices include', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Mileage', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Taxes and fees', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('VAT and airport taxes are included in our prices.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Insurance coverage', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Currently, the total amount of the reservation is refundable if you cancel up to 24 hours in advance.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('If you have made your booking through a third party, please consult the cancellation policy of that third party.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Return outside office hours (Only in Marrakech)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Our prices do not include', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Excess - amount of liability for damage and theft', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Additional mileage', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Fuel', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Additional Extras', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <ul class="w-full flex flex-col gap-2 ps-10 list-decimal">
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Child seats and equipment.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Junior driver supplement (from 19 to 20 years old, both inclusive)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Young driver supplement (from 21 to 24 years old, both inclusive)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Additional driver supplement', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Superior Supplement', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Vehicle choice supplement', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Potential post-return charges', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <ul class="w-full flex flex-col gap-2 ps-10 list-decimal">
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Charge for new damage (exterior and interior) present to the vehicle', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>

                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Charge for lost or misplaced accessories and damage to accessories', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Lost or misplaced documentation fee', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Breakage, loss, theft, or theft of keys fee', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Fuel error fee', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Special cleaning fee', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Charge for smoking inside the vehicle', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Charge for driving outside the territory authorized by :company', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Excess mileage charge', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Fee for return to another office', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Late vehicle return fee', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Rental Vehicle Abandonment Fee', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Fee for returning the rented vehicle in a public car park', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Fee for parking the rented vehicle in the :company spaces during the rental period.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Fine management and advice fee (does not include the price of the fine)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Claims Management, Damage Handling and Advice (DAF) Service Charge', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Breakage/loss/theft/damage charge of any of the stickers or electronic devices inside the vehicle (Etoll, DGT, emissions, melib etc.)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Accessories', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Child seats and equipment.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <ul class="w-full flex flex-col gap-2 ps-10 list-decimal">
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('The contract holder is the only one who can assume responsibility for the assembly of child seats. :company will not, under any circumstances, assume responsibility for the installation of child seats in the rented vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('In the event of breakage, loss or misplacement, theft or theft of the child seat, the contract holder will be responsible for the payment of an additional :price as a replacement cost.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(2000 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Equipment subject to availability, if not booked in advance there may not be availability at the collection of the vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Types of child seats available at :company', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                                <ul class="w-full flex flex-col gap-2 ps-10 list-decimal">
                                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                        <p>{{ __('Infant car seat (0-13 kg) (0-1 years)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                        </p>
                                                    </li>
                                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                        <p>{{ __('360° swivel seat (0-18 kg) (0-4 years)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                        </p>
                                                    </li>
                                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                        <p>{{ __('Forward-facing child seat (9-18 kg) (1-4 years)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                        </p>
                                                    </li>
                                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                        <p>{{ __('High Back Booster Seat (15-36 kg) (4-12 Years)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                        </p>
                                                    </li>
                                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                        <p>{{ __('Travel cot (0-3 years)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                        </p>
                                                    </li>
                                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                        <p>{{ __('Stroller (0-15 kg)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                        </p>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Price of the extra \'Child seats\':', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <table class="w-full rounded-x-thin border border-x-shade">
                                            <thead>
                                                <tr>
                                                    <td class="px-4 py-2 font-x-huge border-e border-x-shade">
                                                        {{ __('Type of seat') }}</td>
                                                    <td class="px-4 py-2 font-x-huge border-e border-x-shade text-center">
                                                        {{ __('PER DAY') }}
                                                    </td>
                                                    <td class="px-4 py-2 font-x-huge border-e border-x-shade text-center">
                                                        {{ __('MINIMUM PER RENTAL') }}</td>
                                                    <td class="px-4 py-2 font-x-huge text-center">
                                                        {{ __('MAXIMUM PER RENTAL') }}</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2 border-e border-x-shade">
                                                        {{ __('High-back booster seat') }}</td>
                                                    <td class="px-4 py-2 border-e border-x-shade font-x-huge text-center">
                                                        {{ number_format(110 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2 border-e border-x-shade font-x-huge text-center">
                                                        {{ number_format(220 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2 font-x-huge text-center">
                                                        {{ number_format(1320 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2 border-e border-x-shade">
                                                        {{ __('Forward-facing child seat') }}</td>
                                                    <td class="px-4 py-2 border-e border-x-shade font-x-huge text-center">
                                                        {{ number_format(110 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2 border-e border-x-shade font-x-huge text-center">
                                                        {{ number_format(200 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2 font-x-huge text-center">
                                                        {{ number_format(1320 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2 border-e border-x-shade">
                                                        {{ __('360° swivel seat') }}</td>
                                                    <td class="px-4 py-2 border-e border-x-shade font-x-huge text-center">
                                                        {{ number_format(130 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2 border-e border-x-shade font-x-huge text-center">
                                                        {{ number_format(260 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2 font-x-huge text-center">
                                                        {{ number_format(1560 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2 border-e border-x-shade">
                                                        {{ __('Baby car seat') }}</td>
                                                    <td class="px-4 py-2 border-e border-x-shade font-x-huge text-center">
                                                        {{ number_format(130 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2 border-e border-x-shade font-x-huge text-center">
                                                        {{ number_format(260 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2 font-x-huge text-center">
                                                        {{ number_format(1560 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2 border-e border-x-shade">
                                                        {{ __('Travel cot') }}</td>
                                                    <td class="px-4 py-2 border-e border-x-shade font-x-huge text-center">
                                                        {{ number_format(130 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2 border-e border-x-shade font-x-huge text-center">
                                                        {{ number_format(260 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2 font-x-huge text-center">
                                                        {{ number_format(1560 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2 border-e border-x-shade">
                                                        {{ __('Stroller') }}</td>
                                                    <td class="px-4 py-2 border-e border-x-shade font-x-huge text-center">
                                                        {{ number_format(130 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2 border-e border-x-shade font-x-huge text-center">
                                                        {{ number_format(260 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2 font-x-huge text-center">
                                                        {{ number_format(1560 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Penalties', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Breakage, damage, loss, theft or theft of accessories inside the vehicle as a replacement cost:', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <ul class="w-full flex flex-col gap-2 ps-10 list-decimal">
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Vehicle stickers (per sticker): :price', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(300 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Vehicle documentation', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Tray: official rating depends on the vehicle model', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Spare wheel: official rating depends on the vehicle model', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Emergency triangles: :price', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(300 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                                </p>
                                            </li>
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('Vest: :price', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(200 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Tire puncture repair fee: :price', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(1000 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Breakage, loss, theft, or theft of keys fee', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('In the event of breakage, loss, theft or theft of the keys to the rented vehicle, :company will apply a penalty of at least :price plus a penalty for the time that the vehicle cannot be used, which will be at least equivalent to one rental day according to the daily rate in force at that time.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(3030 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Fuel error fee', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __(':company will apply a penalty of a minimum of :price and a maximum that can reach the value of the total excess of the vehicle depending on whether there has been an engine breakdown (official valuation).', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(3030 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Vehicle replacement penalty', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('In the event of negligence, cases excluded from the insurance coverage contracted, and in the event of non-compliance with the obligations indicated in point 1.4: :price', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(1000 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Special cleaning fee', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('The rental price includes a standard cleaning of the rented vehicle. However, in the event that the rented vehicle requires special cleaning, :company will charge the contract holder :price to cover the costs of treatment, special cleaning and stoppage of the vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(750 / Core::rate(), 2) . Core::$CURRENCY . ' or ' . number_format(1500 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                        <p>
                                            {{ __('Special cleaning is considered to be any cleaning that requires a more exhaustive action and that involves the vehicle leaving its usual standard washing cycle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>
                                            {{ __('The following table shows some examples where special cleaning charges would apply:', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <table class="w-full rounded-x-thin border border-x-shade">
                                            <thead>
                                                <tr>
                                                    <td
                                                        class="px-4 py-2 font-x-huge w-1/3 text-center border-e border-x-shade">
                                                        {{ __('AMOUNT') }}</td>
                                                    <td class="px-4 py-2 font-x-huge w-2/3 text-center">
                                                        {{ __('EXAMPLES') }}</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="border-t border-x-shade">
                                                    <td rowspan="6"
                                                        class="px-4 py-2 font-x-huge border-e border-x-shade">
                                                        {{ number_format(750 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        {{ __('Mud or dirt inside the vehicle') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2">{{ __('Animal hairs') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2">{{ __('Sand') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2">
                                                        {{ __('Waste scraps (bottles, papers, food scraps)') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2">
                                                        {{ __('Cigarette butts, ash') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2">{{ __('Stickers') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td rowspan="8"
                                                        class="px-4 py-2 font-x-huge border-e border-x-shade">
                                                        {{ number_format(1500 / Core::rate(), 2) . Core::$CURRENCY }}
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        {{ __('Remains of cement, plaster or any other material that implies that the vehicle has been used for works.') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2">{{ __('Vomiting') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2">
                                                        {{ __('Human or animal excrement') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2">
                                                        {{ __('Stains affecting the dashboard, seats, upholstery, trim, belts and elements of the cabin in general') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2">
                                                        {{ __('Paint odor or stains') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2">
                                                        {{ __('Odor or stains from chemicals') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2">{{ __('Oil') }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-x-shade">
                                                    <td class="px-4 py-2">{{ __('Fuels') }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p>
                                            {{ __('A rental will check the vehicle with the renter upon return and their allegations will be taken into account. You will be sent a report and details of the costs, as well as photographs and justification of the state of dirt of the vehicle. In case of disagreement, the tenant may send their allegations within 14 days to the customer service and complaints email. In the event that you do not agree with the resolution, you may file a complaint with consumer or with the competent courts.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Charge for smoking inside the vehicle', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __(':company does not allow smoking inside its vehicles. In the event that the vehicle smells of tobacco, :company will apply a penalty of :price to cover the costs of treatment, special cleaning and stopping of the vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(500 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                        <p>{{ __('A rental will check the vehicle with the renter upon return and their allegations will be taken into account. In the event of disagreement with the valuation of the rental, the lessee may send their allegations to the customer service email within 14 days and if they do not agree with the resolution, resort to consumer arbitration to whose decision the parties submit for the resolution of these conflicts.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Fee for return to Different city', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __(':company does not offer one-way rentals. The contract holder must return the rented vehicle anywhere in Marrakech within a 5km max of Marrakech city center. In the event that the contract holder returns the rented vehicle at a City than the one where you picked it up, the contract holder will have to pay for transportation fees, fuel, highway cost, and the staff member that will bring the car back to Marrakech, the amount will range from :price depending on how far the car is', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(500 / Core::rate(), 2) . Core::$CURRENCY . ' to ' . number_format(15000 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Late vehicle return fee', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __(':company offers a courtesy margin of 60 minutes on the return of the rented vehicle with respect to the pick-up time of the same.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('However, for its application, this margin of courtesy must be determined and applied at the time of making the contract, when the return time is chosen, otherwise, it cannot be applied.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __(':company rates are calculated based on 24-hour periods from the start of the rental.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('In the event that the contract holder does not return the rented vehicle at the agreed return point at the time indicated in their rental agreement, the contracted coverage will be invalidated and the contract holder will be responsible for the payment of the damage caused to the rented vehicle and all the expenses generated, which may reach the amount of the total excess and :company will apply a penalty of :price plus the expenses that you have to incur for the recovery of the vehicle, which will be a minimum of :min in the event that it has been reported after 24 hours.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(400 / Core::rate(), 2) . Core::$CURRENCY, 'min' => number_format(3000 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                        <p>{{ __('In addition to the above, the contract holder will also be responsible for payment of the current daily rental rate (1) at that time, including the charges for the contracted options for each day of delay in the delivery of the vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('Reciprocally, in the event that :company is delayed in the delivery of the vehicle by more than 60 minutes from the signing of the rental contract, the customer will be compensated in the same amount of :price.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(400 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Rental Vehicle Abandonment Fee', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('In the event of abandonment of the vehicle, :company will apply a penalty of :price. In addition to this payment, the contract holder will also be responsible for the payment of the daily rental rate (see table of rates in section \'Extras, accessories, charges and coverage\') and the costs of recovering the vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(2000 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                        <p>{{ __('This penalty will also apply to the Meet & Greet extra under the terms indicated in 4.2.3', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Fee for returning the rented vehicle to the public car park at the pick-up airport', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('In the event that the contract holder returns the rented vehicle to a public car park at the pick-up airport, if the rented vehicle is recovered on the same day of return as stated in the contract, :company will apply a penalty of :price. If the rented vehicle is not recovered on the same day of return as stated in the contract, :company will apply the penalty corresponding to the late return charge of the vehicle and the customer will be responsible for the payment of the vehicle recovery costs.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(300 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Fee for parking the rented vehicle in the :company spaces during the rental period', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('In the event that the driver parks in :company parking spaces during the rental period, :company will apply a penalty of :price/day.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(250 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Claims Management, Damage Handling and Advice (DAF) Service Charge', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('In the event of damage, the driver must duly fill in the accident report, hand it in at the :company office at the time of return of the rented vehicle and send a copy of the report to the :email email address.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __(':company will process accident reports, guide the contract holder on how to act and advise them in the event of injury and/or court summonses. :company will charge :price to the contract holder for this claims management, damage handling and advice (DAF) service.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(500 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Additional kilometre charge on limited mileage fares', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('The above penalties are detailed and informed to the client in the booking process, highlighting the key information, so that the information can be marked for acceptance.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('Upon the return of the vehicle, a rental will check the vehicle with the lessee and their allegations will be taken into account. The customer will be informed of any penalties that apply as indicated above. You will be sent a report and details of the costs, photographs, as well as the necessary supporting documentation. In case of disagreement, the tenant may send their allegations to the customer service email and complaints within 14 days. In the event that you do not agree with the resolution, you may file a complaint with consumer or the competent courts.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('In case of exceeding the mileage included per rental, :company will apply a penalty of :price for each additional kilometre. In the event of early return of the vehicle, the calculation of the kilometres applicable per day to the days enjoyed will be made and this penalty will be applied if applicable.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(40 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Gasoline/Diesel', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <div class="flex flex-col gap-2 text-x-black text-base font-normal">
                                    <p>{{ __('Fuel tank prices and service and refuelling charges are calculated based on official oil prices at the time of pick-up of the rented vehicle. These prices should be consulted regularly, as they are likely to be updated according to the fluctuation of official prices.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                    </p>
                                    <p>{{ __('Full-full fuel return system conditions:', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                    </p>
                                </div>
                                <ul class="w-full flex flex-col gap-4 ps-10">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('When the vehicle is collected, :company delivers the vehicle with a full tank of fuel and collects the amount of the tank.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('The amount charged depends on the model/make of vehicle received and the market price on the day of collection. The contract holder will pay the price of the fuel of the vehicle enjoyed.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('When the vehicle is returned, :company checks the fuel level of the tank and refunds the amount corresponding to the fuel present in the tank. In order to consider that the vehicle has been returned with a full tank, it will be an essential condition that the ticket from a petrol station located at a maximum distance of 10 km from the vehicle return office is presented.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('The unit of measurement of the fuel tank will be for every 1/8 of the vehicle\'s complete tank.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('If the contract holder does not return the vehicle with a full tank, :company will charge :price for the refuelling service.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(350 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Payment', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <div class="flex flex-col gap-2 text-x-black text-base font-normal">
                                    <p>{{ __('The signing of the rental contract and the collection of the vehicle entails an obligation to pay without the right of withdrawal.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                    </p>
                                    <p>{{ __('By signing the rental contract, the contract holder expressly authorises :company to use the bank card provided at the time of rental for the following purposes:', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                    </p>
                                </div>
                                <ul class="w-full flex flex-col gap-4 ps-10">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Charge for the rental of the vehicle with all the contracted options: extras, additional coverage and fuel tank.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If applicable, block the amount of the pre-authorization corresponding to the rented vehicle group. This amount will not be available for use until the unlock is effected.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('For special group bookings and debit card payments, the pre-authorization will be charged, not blocked.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __('Depending on the bank issuing the card, it may take a maximum of 30 calendar days after the end date of the rental agreement to unblock the pre-authorization amount to appear on the contract holder\'s bank card statement.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <p>{{ __(':company is not responsible for any fees charged by the contract holder\'s bank on the return of the pre-authorization.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If applicable, charge any charges arising from alterations caused to the vehicle during the rental (damage, documentation, missing accessories, level of cleanliness) and non-compliance or violation of any of the obligations and/or terms and conditions established in this rental agreement.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Payment Methods', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Visa and MasterCard credit cards', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Visa and MasterCard debit cards (except prepaid cards)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('American Express cards', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('EC-Karte and UnionPay cards (except prepaid cards)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Payment Restrictions and Considerations', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Prepaid cards and Revolut cards (any type) are not accepted', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Payment is not accepted via smartphone, smartwatch or similar or by cheque or transfer.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The holder of the bank card with which the rent payment is made must be the holder of the contract and the contract holder must be present at the time of collection.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                        <ul class="w-full flex flex-col gap-2 ps-10 list-decimal">
                                            <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                                <p>{{ __('The contract holder can enter into several rental contracts with the same card on the condition that in rental contracts in which the contract holder is not the main driver, they contract Total Comfort coverage.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The payer will be responsible for knowing your bank card PIN if you pay with a card that includes this technology.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The payer must ensure that their bank card has sufficient funds at the time of collection of the vehicle to be able to charge for the rental with all the options contracted and, if applicable, block the amount of the pre-authorization corresponding to the group of the rented vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Credit and debit cards without numbering must be nominative and the card number and expiry date must be accredited at the time of opening the contract.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Payments and blocking at the time of collection', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('At the time of pick-up of the vehicle and payment of the rental, :company will charge the rental charges to be paid at the counter on the bank card of the contract holder and will block the pre-authorization corresponding to the type of vehicle rented.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The pre-authorization will not be available for use until the unlock is completed. :company is not responsible for any commissions charged by the renter\'s bank on the return of the pre-authorization.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The pre-authorization is the amount of the excess that will be blocked on the bank card of the contract holder provided at the time of collection of the vehicle, if the Total Comfort cover is not contracted.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Modifications before the start of the rental', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <div class="flex flex-col gap-2 text-x-black text-base font-normal">
                                    <p>{{ __('If the customer has made the reservation directly with :company, it will be allowed to cancel the reservation free of charge up to 24 hours before the start of the rental.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                    </p>
                                    <p>{{ __('It will also be possible to modify the reservation, if the modification is related to the time of pick-up and/or return of the vehicle (provided that there is no change of days) or the flight number.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                    </p>
                                    <p>{{ __('Restrictions', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                    </p>
                                </div>
                                <ul class="w-full flex flex-col gap-4 ps-10">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('No modifications will be allowed to be made to the booking holder, the rental vehicle group, the rental dates, the number of rental days or the extras contracted. In these cases, it will be necessary to cancel the reservation and make a new one.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('It will not be allowed to modify reservations that have a discount applied. The reservation will have to be canceled and a new one made.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                                <div class="flex flex-col gap-2 text-x-black text-base font-normal">
                                    <p>{{ __('If the customer has made the booking through an intermediary, they must contact the intermediary to arrange any modifications or cancellations.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Extensions', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __(':company does support extensions of the rental agreement, under the condition of contacting our staff 24 hours prior the end of the contract.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Replacements due to theft, accident/claim, breakdown or mechanical failure', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('In the event of theft, accident or breakdown, :company reserves the right to replace the vehicle, which will always be subject to availability, and may be denied if :company considers that the alterations produced in the rented vehicle were caused by the breach or violation of the obligations and conditions established in this rental agreement, which have been previously accepted by the renter (see section 1.4 of obligations of the contract holder and drivers), due to the lessee\'s accident rate or any other circumstance that may entitle them by law.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __(':company has a period of up to 72 hours to assess the situation with the information it has and decide on the delivery of the replacement vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Only one replacement will be made per vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The replacement must always be carried out at the collection office and will always be subject to availability, possible penalties, additional charges and new excess, with the first excess being available for the fulfilment of the obligations of the first vehicle delivered. The new franchise will be charged. The contract holder and their card must be present at the time of replacement.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If :company replaces the rented vehicle in the event of theft, accident/claim, breakdown or mechanical failure, :company will assess the situation and study the most effective solution: the driver may be advised to drive to the office to obtain a replacement vehicle or a tow truck will be sent to tow the rented vehicle to the nearest :company office.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('In the event that it is possible for the contract holder to drive to the office to make the replacement, he or she must go to the :company parking office with the rented vehicle with a full tank at the time previously agreed by :company.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('It is mandatory for the contract holder to be present at the time of the replacement and to present his or her national identity card, passport or equivalent document as proof of identity.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Cancellations', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If the customer has made the reservation directly with :company, it can be cancelled free of charge and receive a full refund of the amount of the reservation, up to 24 hours before the rental starts. The reservation will not be refunded if it is cancelled before the scheduled pick-up time less than 24 hours in advance, after the scheduled pick-up time or if the vehicle cannot be delivered to you due to non-compliance with any of the obligations.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If the customer has contracted the Airport (extra meet & greet) rate, they can cancel their booking free of charge and receive a full refund of the amount of the booking, up to 24 hours before the rental starts. The reservation will not be refunded if it is cancelled before the scheduled pick-up time less than 24 hours in advance, after the scheduled pick-up time or if the vehicle cannot be delivered to you due to non-compliance with any of the obligations.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If the customer has made the booking through an intermediary, they must contact them to manage the cancellation of the booking.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('No show', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If the customer does not show up at the counter on the date and time agreed at the time of booking, the booking will be breached and will be considered a \'no show\'.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If the client shows up at the counter on the date and time agreed at the time of booking and does not comply with the booking conditions and contractual terms and/or owes a debt to this company, the booking will be breached and will be considered a \'no show\'.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If the customer has made the reservation directly with :company, they will have a margin of 24 calendar hours to show up at the rental office after the pick-up time scheduled in the reservation before the reservation is breached and is considered a \'no show\'. This condition will always be subject to the availability of vehicles.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If the customer has made the reservation through an intermediary, they will have a margin of 6 working hours to appear at the rental office after the pick-up time scheduled in the reservation before the reservation is breached and is considered a \'no show\'. This condition will always be subject to the availability of vehicles.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __(':company will not refund the amount of the reservation in case of a \'no show\'.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Late collection of the vehicle', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('In the event of late collection of the vehicle due to flight/train delay, if the customer is going to suffer a delay of more than one hour, they must notify :company of the delay via email to :email or by phone by calling :phone indicating their flight or train number. :company will assess the flight/train delay and will inform the customer whether they can wait for them or not, depending on the closing time of the office. If the booking holder does not inform :company about the delay in their flight, :company will not be able to guarantee the pick-up service of the vehicle.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'phone' => Core::getSetting('contact_phone')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('If the customer arrives at the counter outside office hours, :company will apply the \'Charge for pick-up outside office hours\' (:price)', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(400 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The booking holder has a margin of 40 minutes to report to the office after their flight has landed or their train has arrived as long as the flight/train has not been delayed beyond 60 minutes from the closing time of the office.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Early return of the vehicle', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('In the event of an early return of the rented vehicle, :company will not apply any penalty to the contract holder. Likewise, it will not make a refund for unused days, as well as for the extras contracted for unused days.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Rates with limited mileage: in the event of an early return of the rented vehicle, the customer will only be able to travel the kilometers corresponding to the rental days enjoyed.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Minimum advance booking', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('the minimum advance booking is 4 hour.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Fines', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('In the event that the driver is imposed a traffic fine during the rental period, :company is obliged by law to identify him and provide the authorities with his personal data, so that the contract holder will receive the penalty imposed on him for payment at his address. In the event that the identification of the driver cannot be carried out for reasons not attributable to :company, the renter will be responsible for the payment of any fine or penalty committed during the rental period. The lessee must hold the lessor harmless from any sanctions, fines, fees, surcharges and, in general, costs of any kind imposed by the Administrations as a result of the driver\'s infraction. In the event of a fine, with :company, the driver will not be alone, he will be informed and will have at his disposal our external legal service who can help him pay the fine and/or advise him on the possibilities of appeal. For this additional service, :company will charge an amount of :price (VAT included) for management and advice. The above amount does not include the payment of the traffic fine if applicable.',['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email'), 'price' => number_format(400 / Core::rate(), 2) . Core::$CURRENCY]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Office Hours', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The office hours according to delegation and season are as follows:', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Monday to Friday: 09AM to 11PM', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Saturday and Sunday: 11am to 06PM', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Legal regime and jurisdiction', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('The rental agreement is governed by the Terms and Conditions described in the previous points and by the Spanish legislation on the rental of things. Any disagreement that may arise between the Lessor and the Lessee, they agree to submit to the Moroccan Courts that legally correspond with express will against the submission to arbitration.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs find w-full flex flex-col">
                        <button
                            class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                            <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                fill="currentColor">
                                <path
                                    d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                            </svg>
                            <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                {{ __('Reservation of rights', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                            </h3>
                        </button>
                        <div class="w-full txt">
                            <div class="w-full flex flex-col gap-4 p-4 ps-12">
                                <ul class="w-full flex flex-col gap-4">
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __(':company reserves the right not to rent vehicles to those customers who violate any of the conditions or obligations established in this document.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                    <li class="flex flex-col gap-2 text-x-black text-base font-normal">
                                        <p>{{ __('Likewise, :company reserves the right not to rent the vehicle in case of well-founded doubts about the possibility of non-compliance with the obligations of this contract, due to a history of non-payment or incidents by the customer.', ['company' => env('COMPANY_NAME'), 'email' => Core::getSetting('contact_email')]) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-col gap-6">
                    <h2 class="text-x-black font-x-huge text-xl -mb-2">
                        {{ __('QUICK LINKS') }}
                    </h2>
                    @if (route('views.guest.terms') !== route('views.guest.faqs'))
                        <a href="{{ route('views.guest.faqs') }}"
                            class="w-full flex flex-col gap-2 p-4 bg-x-light rounded-x-thin outline-none hover:bg-x-prime hover:bg-opacity-20 hover:shadow-x-core focus:bg-x-prime focus:bg-opacity-20 focus:shadow-x-core">
                            <h3 class="text-x-black font-x-huge text-base">
                                {{ __('FAQ') }}
                            </h3>
                            <p class="text-x-black text-opacity-70 font-x-thin text-sm">
                                {{ __('Find quick answers to common queries, ensuring a smooth experience.') }}
                            </p>
                        </a>
                    @endif
                    @if (route('views.guest.terms') !== route('views.guest.terms'))
                        <a href="{{ route('views.guest.terms') }}"
                            class="w-full flex flex-col gap-2 p-4 bg-x-light rounded-x-thin outline-none hover:bg-x-prime hover:bg-opacity-20 hover:shadow-x-core focus:bg-x-prime focus:bg-opacity-20 focus:shadow-x-core">
                            <h3 class="text-x-black font-x-huge text-base">
                                {{ __('Terms And Conditions') }}
                            </h3>
                            <p class="text-x-black text-opacity-70 font-x-thin text-sm">
                                {{ __('Explore our guidelines for services usage, outlining responsibilities, rights, and limitations for a transparent relationship.') }}
                            </p>
                        </a>
                    @endif
                    @if (route('views.guest.terms') !== route('views.guest.privacy'))
                        <a href="{{ route('views.guest.privacy') }}"
                            class="w-full flex flex-col gap-2 p-4 bg-x-light rounded-x-thin outline-none hover:bg-x-prime hover:bg-opacity-20 hover:shadow-x-core focus:bg-x-prime focus:bg-opacity-20 focus:shadow-x-core">
                            <h3 class="text-x-black font-x-huge text-base">
                                {{ __('Privacy Policy') }}
                            </h3>
                            <p class="text-x-black text-opacity-70 font-x-thin text-sm">
                                {{ __('Discover how we safeguard your data and outline its usage, ensuring confidentiality and security.') }}
                            </p>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/neo/plugins/explore.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    <script src="{{ asset('js/info.min.js') }}?v={{ env('APP_VERSION') }}"></script>
@endsection

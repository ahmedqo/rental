<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Car;
use App\Models\Image;
use App\Models\Reservation;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CarController extends Controller
{
    public function index_view(Request $Request)
    {
        return view('car.index');
    }

    public function store_view()
    {
        return view('car.store');
    }

    public function patch_view($id)
    {
        $data = Car::with('Category:id,name_' . Core::lang(), 'Brand:id,name_' . Core::lang(), 'Images')->select(
            'id',
            'category',
            'brand',
            'passengers',
            'doors',
            'cargo',
            'transmission',
            'fuel',
            'status',
            'promote',

            'price_january',
            'price_february',
            'price_march',
            'price_april',
            'price_may',
            'price_june',
            'price_july',
            'price_august',
            'price_september',
            'price_october',
            'price_november',
            'price_december',

            'slug',
            'name_en',
            'name_fr',
            'name_it',
            'name_sp',
            'details_en',
            'details_fr',
            'details_it',
            'details_sp',
        )->findorfail($id);
        return view('car.patch', compact('data'));
    }

    public function scene_view($id)
    {
        $data = Car::with('Category:id,name_' . Core::lang(), 'Brand:id,name_' . Core::lang(), 'Images', 'Reviews')->select(
            'id',
            'category',
            'brand',
            'slug',
            'status',
            'promote',
            'passengers',
            'doors',
            'cargo',
            'transmission',
            'fuel',
            'price_' . strtolower(Carbon::now()->format('F')),
            'name_' . Core::lang(),
            'details_' . Core::lang(),
            'description_' . Core::lang(),
        )->findorfail($id);

        [$startDate, $endDate, $columns] = Core::getDates();

        $reservations = Reservation::where('car', $id)->where(function ($query) use ($startDate, $endDate) {
            $query->where('from', '<=', $endDate)
                ->where('to', '>=', $startDate);
        })->get();

        $completed = $reservations->where('status', 'completed');
        $others =  $reservations->where('status', '!=', 'completed');

        $count = [$completed->count(), $others->count()];
        $work = [$completed->sum('period'), $others->sum('period')];
        $money = [$completed->sum('total'), $others->sum('total')];
        $charges = [$completed->reduce(function ($carry, $curr) {
            return $carry + json_decode($curr->charges, true)['total'];
        }, 0), $others->reduce(function ($carry, $curr) {
            return $carry + json_decode($curr->charges, true)['total'];
        }, 0)];

        return view('car.scene', compact('data', 'count', 'work', 'money', 'charges'));
    }

    public function search_action(Request $Request)
    {
        $data = Car::with('Category:id,name_en', 'Brand:id,name_en', 'Images')->select(
            'id',
            'category',
            'brand',
            'passengers',
            'doors',
            'cargo',
            'transmission',
            'fuel',
            'status',
            'promote',

            'price_january',
            'price_february',
            'price_march',
            'price_april',
            'price_may',
            'price_june',
            'price_july',
            'price_august',
            'price_september',
            'price_october',
            'price_november',
            'price_december',

            'slug',
            'name_en',
            'details_en',
            'details_fr',
            'details_it',
            'details_sp',
            'price_' . strtolower(Carbon::now()->format('F')),
        )->orderBy('id', 'DESC');
        if ($Request->search) {
            $data = $data->search(urldecode($Request->search));
        }
        $data = $data->cursorPaginate(50)->through(function ($car) {
            $car->price = $car->price;
            return $car;
        });
        return response()->json($data);
    }

    public function description_action($id)
    {
        $data = Car::select(
            'id',
            'description_en',
            'description_fr',
            'description_it',
            'description_sp',
        )->findorfail($id);
        return response()->json(['data' => $data]);
    }

    public function reservations_action(Request $Request, $id)
    {
        [$startDate, $endDate, $columns] = Core::getDates();

        $data = Reservation::where('car', $id)->where(function ($query) use ($startDate, $endDate) {
            $query->where('from', '<=', $endDate)
                ->where('to', '>=', $startDate);
        });
        if ($Request->search) {
            $data = $data->search(urldecode($Request->search));
        }
        $data = $data->cursorPaginate(50);
        return response()->json($data);
    }

    public function reviews_action(Request $Request, $id)
    {
        [$startDate, $endDate, $columns] = Core::getDates();

        $data = Review::where('car', $id)->where(function ($query) use ($startDate, $endDate) {
            $query->where('updated_at', '<=', $endDate)
                ->where('updated_at', '>=', $startDate);
        });
        if ($Request->search) {
            $data = $data->search(urldecode($Request->search));
        }
        $data = $data->cursorPaginate(50);
        return response()->json($data);
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name_en' => ['required', 'string', 'unique:cars'],
            'transmission' => ['required', 'string'],
            'passengers' => ['required', 'integer'],
            'category' => ['required', 'integer'],
            'promote' => ['required', 'string'],
            'status' => ['required', 'string'],
            'doors' => ['required', 'integer'],
            'cargo' => ['required', 'integer'],
            'brand' => ['required', 'integer'],
            'price_january' => ['required', 'numeric'],
            'price_february' => ['required', 'numeric'],
            'price_march' => ['required', 'numeric'],
            'price_april' => ['required', 'numeric'],
            'price_may' => ['required', 'numeric'],
            'price_june' => ['required', 'numeric'],
            'price_july' => ['required', 'numeric'],
            'price_august' => ['required', 'numeric'],
            'price_september' => ['required', 'numeric'],
            'price_october' => ['required', 'numeric'],
            'price_november' => ['required', 'numeric'],
            'price_december' => ['required', 'numeric'],
            'fuel' => ['required', 'string'],
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Car::create($Request->merge([
            'slug' =>  Str::slug($Request->name_en),
            'name_fr' => $Request->name_en,
            'name_it' => $Request->name_en,
            'name_sp' => $Request->name_en,
            'promote' => $Request->promote == '1'
        ])->all());

        foreach ([
            'cars_en_list',
            'cars_fr_list',
            'cars_it_list',
            'cars_sp_list',
        ] as $key) {
            Cache::forget($key);
        }

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function patch_action(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [
            'name_en' => ['required', 'string', 'unique:cars,name_en,' . $id],
            'transmission' => ['required', 'string'],
            'passengers' => ['required', 'integer'],
            'category' => ['required', 'integer'],
            'promote' => ['required', 'string'],
            'status' => ['required', 'string'],
            'doors' => ['required', 'integer'],
            'cargo' => ['required', 'integer'],
            'brand' => ['required', 'integer'],
            'price_january' => ['required', 'numeric'],
            'price_february' => ['required', 'numeric'],
            'price_march' => ['required', 'numeric'],
            'price_april' => ['required', 'numeric'],
            'price_may' => ['required', 'numeric'],
            'price_june' => ['required', 'numeric'],
            'price_july' => ['required', 'numeric'],
            'price_august' => ['required', 'numeric'],
            'price_september' => ['required', 'numeric'],
            'price_october' => ['required', 'numeric'],
            'price_november' => ['required', 'numeric'],
            'price_december' => ['required', 'numeric'],
            'fuel' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Car = Car::findorfail($id);

        if ($Request->deleted && !$Request->hasFile('images') && $Car->Images->count() == count($Request->deleted)) {
            return Redirect::back()->withInput()->with([
                'message' => __('The images field is required'),
                'type' => 'error'
            ]);
        }

        foreach ([
            'cars_en_list',
            'cars_fr_list',
            'cars_it_list',
            'cars_sp_list',
            'car_' . $Car->slug . '_en',
            'car_' . $Car->slug . '_fr',
            'car_' . $Car->slug . '_it',
            'car_' . $Car->slug . '_sp',
        ] as $key) {
            Cache::forget($key);
        }

        $Car->update($Request->merge([
            'slug' =>  Str::slug($Request->name_en),
            'name_fr' => $Request->name_en,
            'name_it' => $Request->name_en,
            'name_sp' => $Request->name_en,
            'promote' => $Request->promote == '1'
        ])->all());

        if ($Request->hasFile('images')) {
            foreach ($Request->file('images') as $Image) {
                Image::$FILE = $Image;
                $Car->Images()->create();
            }
        }

        if ($Request->deleted) {
            foreach ($Request->deleted as $id) {
                Image::findorfail($id)->delete();
            }
        }

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function clear_action($id)
    {
        Car::findorfail($id)->delete();

        foreach ([
            'cars_en_list',
            'cars_fr_list',
            'cars_it_list',
            'cars_sp_list',
        ] as $key) {
            Cache::forget($key);
        }

        return Redirect::route('views.cars.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}

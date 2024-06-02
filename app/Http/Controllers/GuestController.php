<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Blog;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
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
        return view('guest.fleet', compact('cars', 'types'));
    }

    public function blogs_view()
    {
        $blogs = Blog::with('Image')->cursorPaginate(50);
        return view('guest.blogs', compact('blogs'));
    }

    public function show_view($slug)
    {
        $car = Car::with('Category', 'Brand', 'Images')->where('slug', $slug)->limit(1)->first();
        if (!$car) abort(404);
        return view('guest.show', compact('car'));
    }

    public function blog_view($slug)
    {
        $blog = Blog::with('Image')->where('slug', $slug)->limit(1)->first();
        if (!$blog) abort(404);
        return view('guest.blog', compact('blog'));
    }

    public function order_action(Request $Request)
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

        Order::create($Request->merge([
            'from' => $from,
            'to' => $to,
            'period' => $period,
            'total' => $total,
            'status' => 'pendding'
        ])->all());

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }
}
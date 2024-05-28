<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index_view()
    {
        $cars = Car::joinSub(
            Car::select(DB::raw('MAX(id) as id'))->whereIn(
                'category',
                Category::inRandomOrder()->limit(10)->pluck('id')
            )->where('status', Core::statusList()[0])->where('promote', true)->groupBy('category'),
            'sub',
            function ($join) {
                $join->on('cars.id', '=', 'sub.id');
            }
        )->get();

        return view('guest.index', compact('cars'));
    }

    public function fleet_view()
    {
        $cars = Car::with('Images')->cursorPaginate(50);
        $types = Category::pluck('name_' . Core::lang());
        return view('guest.fleet', compact('cars', 'types'));
    }
}

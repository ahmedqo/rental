<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CoreController extends Controller
{
    public function index_view()
    {
        [$startDate, $endDate, $columns] = Core::getDates();

        $reservations = Reservation::where(function ($query) use ($startDate, $endDate) {
            $query->where('from', '<=', $endDate)
                ->where('to', '>=', $startDate);
        })->get();

        $completed = $reservations->where('status', 'completed');
        $others =  $reservations->where('status', '!=', 'completed');

        $count = [$completed->count(), $others->count()];
        $work = [$completed->sum('period'), $others->sum('period')];
        $money = [Core::formatNumber($completed->sum('total')), Core::formatNumber($others->sum('total'))];
        $charges = [Core::formatNumber($completed->reduce(function ($carry, $curr) {
            return $carry + json_decode($curr->charges, true)['total'];
        }, 0)), Core::formatNumber($others->reduce(function ($carry, $curr) {
            return $carry + json_decode($curr->charges, true)['total'];
        }, 0))];

        return view('core.index', compact('count', 'work', 'money', 'charges'));
    }

    public function most_action()
    {
        [$startDate, $endDate, $columns] = Core::getDates();

        $data = Reservation::with('Car')->where('status', 'completed')->where(function ($query) use ($startDate, $endDate) {
            $query->where('from', '<=', $endDate)
                ->where('to', '>=', $startDate);
        })->get()->groupBy('car')->map(
            function ($group) {
                $Car = $group->first()->Car;

                $total = $group->sum('total');
                $charges = $group->reduce(function ($carry, $item) {
                    return $carry + json_decode($item->charges, true)['total'];
                }, 0);

                $period = $group->reduce(function ($carry, $item) {
                    return $carry + $item->period;
                }, 0);

                $profit = $total - $charges;

                $id = $Car->id;
                $storage = $Car->Images[0]->storage;
                $price = $Car->price;
                $name = $Car->name;

                return compact('id', 'profit', 'charges', 'period', 'storage', 'price', 'name');
            }
        )->sortByDesc('profit')->take(10)->toArray();

        return response()->json(['data' => array_values($data)]);
    }
}

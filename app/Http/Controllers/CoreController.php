<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Reservation;
use Carbon\Carbon;

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
}

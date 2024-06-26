<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Reservation;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

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
        $money = [$completed->sum('total'), $others->sum('total')];
        $charges = [$completed->reduce(function ($carry, $curr) {
            return $carry + json_decode($curr->charges, true)['total'];
        }, 0), $others->reduce(function ($carry, $curr) {
            return $carry + json_decode($curr->charges, true)['total'];
        }, 0)];

        return view('core.index', compact('count', 'work', 'money', 'charges', 'startDate', 'endDate'));
    }

    public function setting_view()
    {
        return view('core.setting');
    }

    public function setting_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'contact_email' => ['required', 'email'],
            'print_email' => ['required', 'email'],
            'notify_email' => ['required', 'email'],
            'contact_phone' => ['required', 'string'],
            'print_phone' => ['required', 'string'],
            'period' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        foreach ([
            'usd_rate',
            'eur_rate',
            'contact_email',
            'print_email',
            'notify_email',
            'contact_phone',
            'print_phone',
            'period',
            'instagram',
            'telegram',
            'facebook',
            'youtube',
            'tiktok',
            'x',
        ] as $type) {
            Setting::findBy($type)->update([
                'content' => $Request->input($type)
            ]);
        }

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function chart_action()
    {
        [$startDate, $endDate, $columns] = Core::getDates();

        $profit = array_slice($columns, 0);
        $charges = array_slice($columns, 0);

        Reservation::where('status', 'completed')->where(function ($query) use ($startDate, $endDate) {
            $query->where('from', '<=', $endDate)
                ->where('to', '>=', $startDate);
        })->get()->groupBy(function ($model) {
            return Core::groupKey($model);
        })->map(function ($group) {
            $total = $group->sum(function ($carry) {
                return $carry->total;
            });
            $charges = $group->sum(function ($carry) {
                return json_decode($carry->charges, true)['total'];
            });

            return [$total - $charges, $charges];
        })->each(function ($item, $key) use (&$profit, &$charges) {
            $profit[$key] = $item[0];
            $charges[$key] = $item[1];
        });

        return response()->json([
            'data' => [
                array_keys($columns),
                array_values($profit),
                array_values($charges)
            ]
        ]);
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

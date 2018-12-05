<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users_count = User::count();

        return view('admin.dashboard.index')->with([
            'users_count' => $users_count,
        ]);
    }

    public function getCheckInChart()
    {
        $nomination_chart = DB::table('nominations')
            ->select('check_time as period',
                DB::raw('count(id) as count'),
                DB::raw('MONTH(FROM_UNIXTIME(MAX(check_time))) as month'),
                DB::raw('YEAR(FROM_UNIXTIME(MAX(check_time))) as month')
            )->groupBy('period')->get();

        $nomination_chart_month = [];
        $nomination_chart_data = [];

        dd($nomination_chart);

        foreach ($nomination_chart as $chart) {
            array_push($nomination_chart_month, date('F', mktime(0, 0, 0, $chart->month, 10)).'-'.$chart->year);
            array_push($nomination_chart_data, $chart->count);
        }

        $get_nomination_chart = [json_encode($nomination_chart_month), json_encode($nomination_chart_data)];

        return $get_nomination_chart;
    }
}

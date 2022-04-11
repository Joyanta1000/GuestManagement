<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeSetupController extends Controller
{
    public function index()
    {
        return view('TimeManagement.index');
    }

    public function create()
    {
        $time = '12:30';
        $to_back = '2';
        $timing = 'hr';
        $meridiem = 'AM';
        $timezone = 'Asia/Dhaka';

        date_default_timezone_set($timezone);

        if (strpos($time, ':') !== false) {
            $date_time_1 = strtotime($time);
        } else if (strpos($time, ':') == false) {
            $date_time_1 = strtotime($time . ':00');
        }

        if (strpos($to_back, ':') !== false && $timing == 'hr') {
            $date_time_2 = strtotime($to_back);
        } else if (strpos($to_back, ':') == false && $timing == 'hr') {
            $date_time_2 = strtotime($to_back . ':00');
        } else if (strpos($to_back, ':') == false && $timing == 'min' && strlen($to_back) != 1) {
            $date_time_2 = strtotime('00:' . $to_back);
        } else if (strpos($to_back, ':') == false && $timing == 'min' && strlen($to_back) == 1) {
            $date_time_2 = strtotime('00:0' . $to_back);
        }

        $time_diff = $date_time_1 - $date_time_2;

        if ($meridiem == 'AM' || $meridiem == 'am') {
            $time_diff = $time_diff + 12 * 60 * 60;
        } else if ($meridiem == 'PM' || $meridiem == 'pm') {
            $time_diff = $time_diff;
        }

        $current = Carbon::now()->format('H:i');

        $datetime = Carbon::now()->parse($time_diff)->format("H:i");

        if ($current < $datetime) {
            dd('current time: ', $current, 'substracted time: ', $datetime, 'current time is less than substracted time');
        } else {
            dd('current time: ', $current, 'substracted time: ', $datetime, 'current time is greater than substracted time');
        }
    }

    public function store(Request $request)
    {
        $time = $request->time;
        $to_back = $request->to_back;
        $timing = $request->timing;
        $meridiem = $request->meridiem;
        $timezone = $request->timezone;

        date_default_timezone_set($timezone);

        if (strpos($time, ':') !== false) {
            $date_time_1 = strtotime($time);
        } else if (strpos($time, ':') == false) {
            $date_time_1 = strtotime($time . ':00');
        }

        if (strpos($to_back, ':') !== false && $timing == 'hr') {
            $date_time_2 = strtotime($to_back);
        } else if (strpos($to_back, ':') == false && $timing == 'hr') {
            $date_time_2 = strtotime($to_back . ':00');
        } else if (strpos($to_back, ':') == false && $timing == 'min' && strlen($to_back) != 1) {
            $date_time_2 = strtotime('00:' . $to_back);
        } else if (strpos($to_back, ':') == false && $timing == 'min' && strlen($to_back) == 1) {
            $date_time_2 = strtotime('00:0' . $to_back);
        }

        $time_diff = $date_time_1 - $date_time_2;

        if ($meridiem == 'AM' || $meridiem == 'am') {
            $time_diff = $time_diff + 12 * 60 * 60;
        } else if ($meridiem == 'PM' || $meridiem == 'pm') {
            $time_diff = $time_diff;
        }

        $current = Carbon::now()->format('H:i');

        $datetime = Carbon::now()->parse($time_diff)->format("H:i");

        if ($current < $datetime) {
            dd('current time: ', $current, 'substracted time: ', $datetime, 'current time is less than substracted time');
        } else {
            dd('current time: ', $current, 'substracted time: ', $datetime, 'current time is greater than substracted time');
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}

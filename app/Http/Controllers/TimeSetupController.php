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
        
    }

    public function store(Request $request)
    {
        $timezone = 'Asia/Dhaka';
        date_default_timezone_set($timezone);
    
        if(strpos($request->time,':') !== false)
        {
            $date_time_1 = strtotime($request->time);
        }
        else if (strpos($request->time,':') == false)
        {
            $date_time_1 = strtotime($request->time.':00');
        }

        if(strpos($request->to_back,':') !== false && $request->timing == 'hr')
        {
            $date_time_2 = strtotime($request->to_back);
        }
        else if(strpos($request->to_back,':') == false && $request->timing == 'hr')
        {
        $date_time_2 = strtotime($request->to_back . ':00');
        }
        else if(strpos($request->to_back,':') == false && $request->timing == 'min')
        {
            $date_time_2 = strtotime('00:'.$request->to_back);
        }

        $time = $date_time_1 - $date_time_2;

         if($request->meridiem == 'AM' || $request->meridiem == 'am')
         {
            $time = $time;
         }
         else if($request->meridiem == 'PM' || $request->meridiem == 'pm')
         {
            $time = $time - 12*60*60;
         }
     
        $current = Carbon::now()->format('H:i');

        $datetime = Carbon::now()->parse($time)->format("H:i");

        if($current < $datetime){

            dd($current , $datetime,'current time is less than substracted time');
        }
        else{
            dd($current , $datetime, 'current time is greater than substracted time');
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

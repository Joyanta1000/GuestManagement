<?php

namespace App\Http\Controllers;

use App\BookingDetails;
use App\ChildrenAgePrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class GuestManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('hey');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $book = BookingDetails::create([
            'checkin' => Date::parse(Date::now())->format('Y-m-d'),
            'checkout' => Date::parse(Date::now())->format('Y-m-d'),
            'adult' => $request->adult_guest,
            'children' => $request->child_guest,
        ]);

        foreach ($request->ag_guest_ as $key => $value) {
            $book->childrenAgePrice()->create([
                'child_age' => $value,
                'price' => $request->price[$key],
            ]);
        }

        dd('Done');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $details = BookingDetails::with('childrenAgePrice')->find($id);

        // dd($details);

        return view('GuestManagement.edit_bookings', compact('details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = BookingDetails::where('id', $id)
        ->update([
            'checkin' => Date::parse(Date::now())->format('Y-m-d'),
            'checkout' => Date::parse(Date::now())->format('Y-m-d'),
            'adult' => $request->adult_guest,
            'children' => $request->child_guest,
        ]);

        // dd($book, $request->ag_guest_ );

        ChildrenAgePrice::where('booking_details_id', $id)->delete();

        foreach ($request->ag_guest_ as $key => $value) {
            ChildrenAgePrice::create([
                'booking_details_id' => $id,
                'child_age' => $value,
                'price' => $request->price[$key],
            ]);
        }

        dd('Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

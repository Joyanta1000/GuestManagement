<?php

namespace App\Http\Controllers;

use App\AdditionalCost;
use App\BookingDetails;
use Illuminate\Http\Request;
use App\Traits\CalculationTrait;

class CalculationController extends Controller
{
    use CalculationTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $id = 1;
        $given = $request->input('given');

        AdditionalCost::where('booking_details_id', $id)->delete();

        // $book = BookingDetails::find($id);

        // $book->additionalCost()->withTrashed()->get();

        foreach ($request->op_type as $key => $value) {
            AdditionalCost::create([
                'booking_details_id' => $id,
                'op_type' => $value,
                'amount' => $request->amount[$key],
                'comment' => $request->comment[$key],
                'given' => $given,
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
        $details = BookingDetails::with('additionalCost')->find($id);

        // dd($details);

        return view('ServiceManagement.edit_calculation', compact('details'));
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
        
        $this->calculationStore($request, $id);

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

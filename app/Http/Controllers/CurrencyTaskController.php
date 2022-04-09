<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use AmrShawky\LaravelCurrency\Facade\Currency;

class CurrencyTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $from = 'BDT';
        $to = 'INR';
        // indian currency
        $amount= 100;
        $converted=Currency::convert()
            ->from($from) //currncy you are converting
            ->to($to)     // currency you are converting to
            ->amount($amount) // amount in USD you converting to EUR
            ->get();

            dd($converted);

        // if (request()->expectsJson()) {
        //     return view('Currency.currency');
        // }

        // return view('Currency.currency');
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
        //
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
        //
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
        //
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

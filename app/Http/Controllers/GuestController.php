<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function pass_guests_info()
    {
        // return response()->json(request()->all(), '200');
        // echo response()->json(request()->all(), '200');
        $guests = request()->all();
        // if(request()->get('max') != null) {
           session()->put('max', request()->get('max'));
        //    Session::put('max', request()->get('max'));
        session(['max' => request()->get('max')]);
        // }
        // if(request()->get('adult_guest') != null) {
           session()->put('adult_guest', request()->get('adult_guest'));
        //    Session::put('adult_guest', request()->get('adult_guest'));
        session(['adult_guest' => request()->get('adult_guest')]);
        // }
        if(request()->get('child_guest') != null) {
           session()->put('child_guest', request()->get('child_guest'));
        }
        if(request()->get('age_of') != null) {
           session()->put('age_of', request()->get('age_of'));
        }
        
        // return response()->json(session()->all(), '200');
        return view('GuestManagement.pass_guests_info', compact('guests'));
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
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //
    }
}

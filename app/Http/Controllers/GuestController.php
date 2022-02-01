<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Guest;
use Illuminate\Contracts\Session\Session as SessionSession;
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

        // $guests = [
        //     'max' => request()->get('max') ,
        //     'adult_guest' => request()->get('adult_guest') ,
        //     'child_guest' => request()->get('child_guest') ,
        // ];
        $age = [];

        $pushed = array_push($age, request()->get('age_of'));
        // for($i=0; $i<count(request()->get('age_of')); $i++){
            $guests = [
                'max' => request()->get('max') ,
                'adult_guest' => request()->get('adult_guest') ,
                'child_guest' => request()->get('child_guest') ,
                'age_of' => $age ,
            ];
        // }

        // return response()->json(request()->all(), 'hey');
        
        return view('GuestManagement.pass_guests_info', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function any()
    // {
    //     $guests = Session::all();
    //     dd(Session::all());
    //     return view('GuestManagement.pass_guests_info', compact('guests'));
    // }

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

<?php

namespace App\Http\Controllers;

use App\AgeWisePrice;
use Illuminate\Support\Facades\Session;
use App\Guest;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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
            'max' => request()->get('max'),
            'adult_guest' => request()->get('adult_guest'),
            'child_guest' => request()->get('child_guest'),
            'age_of' => $age,
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

        

        for($i = 1; $i <= count($request->get('min')); $i++){
            if($request->get('min')[$i+1] != null){
            $guests = new AgeWisePrice();
            $guests->room_id = 1;
            $guests->min = $request->get('min')[$i+1];
            $guests->max = $request->get('max')[$i+1];
            $guests->price = $request->get('price')[$i+1];
            $guests->is_active = 1;
            $guests->save();
            }
        }

        dd(count($request->get('min')), $request->all());

        

        // $input = $request->all();

        // $rules = [];

        // $i = 1;
        // foreach ($input['min'] as $key => $val) {
        //     $rules['min.' . $i] = 'required';
        //     $i++;
        // }

        // $validator = Validator::make($input, $rules);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->with('error', 'Sequence is not valid');
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $awp = AgeWisePrice::where('room_id', $id)->get();
        $count = 2;
        $loop = '';
        $w = 2;
        $w_1 = 3;
        $loop .= "<table><thead id='thead'><tr><td>Min. Age</td><td>Max. Age</td><td></td><td>Price</td><td></td></tr></thead><tbody>";
        foreach ($awp as $data) {
            
            
            $loop .= "<tr><td><select name='min[$count]' data-id='$w' class = 'select optional form-control' id='min_$count' onclick='ch(this)' required>";
            $loop .= "<option value = '$data->min' selected>$data->min</option>";

            // for (i = max; i <= max; i++) {

            //     // if (i > t) {
            //     //     loop += '<option value="' + i + '" hidden>' + i + '</option>';
            //     // } else  {

            //     // loop += '<option value="' + i + '" hidden>' + i + '</option>';
            //     loop += '<option value="' + i + '" >' + i + '</option>';
            //     // ent = ent+1; 
            //     // }
            //     // else{
            //     //     loop += '<option value="' + i + '" selected>' + i + '</option>';
            //     // }
            //     break;
            // }

            $loop .= "</select></td>";

            $loop .= "<td><select name='max[$count]' class = 'form-control' data-id='$w_1' id='max_$count' onclick='ch(this)' required>";
            $loop .= "<option value = '$data->max'>$data->max</option>";
            // for (i = max; i <= 20; i++) {
            //     if (i < t) {
            //         loop += '<option value="' + i + '" hidden>' + i + '</option>';
            //     } else {
            //         loop += '<option value="' + i + '">' + i + '</option>';
            //     }
            // }
            if($count == 2)
            {
                $idTo = 'add_field';
                $onclick = 'addfield()';
                $class = 'btn btn-success';
                $sign = '+';
            }
            else{
                $idTo = 'remove';
                $onclick = '';
                $class = 'btn btn-danger';
                $sign = '-';
            }
            $loop .= "</select></td><td><input class='form-control' name='price[$count]' required/></td><td>Tk</td><td><button type = 'button' id = $idTo onclick= $onclick class = $class>$sign</button></td></tr>";
            

            $count++;
            $w += 2;
            $w_1 += 2;
        }

        $loop .= "</tbody><tbody id='select_field'></tbody></table>";

        if(request()->ajax()){
            return response()->json([
                'age_wise_price' => $loop
            ]);
        }
        return view('GuestManagement.age_wise_prices');
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

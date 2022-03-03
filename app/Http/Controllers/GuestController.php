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



        for ($i = 1; $i <= count($request->get('min')); $i++) {
            if ($request->get('min')[$i + 1] != null) {
                $guests = new AgeWisePrice();
                $guests->room_id = 1;
                $guests->min = $request->get('min')[$i + 1];
                $guests->max = $request->get('max')[$i + 1];
                $guests->price = $request->get('price')[$i + 1];
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
        // dd($awp);
        $count = 2;
        $loop = '';
        $w = 2;
        $w_1 = 3;
        $max = 0;
        $array = [0,0];
        $loop .= "<div id = 'message'></div><table><thead id='thead'><tr><td>Min. Age</td><td>Max. Age</td><td></td><td>Price</td><td></td></tr></thead><tbody>";

        foreach ($awp as $data) {
            // $increased = $count+1;
            // $myArray->put($count, $data->min);
            // $myArray->put($w, $data->max);
            array_push($array, $data->min);
            array_push($array, $data->max);
            // $myArray = array( $count => $data->min);
            // array_merge($array, $myArray);
            // $myArray = array( $count+1 => $data->max);

            // array_merge($array, $myArray);

            

            $loop .= "<tr ><td><select name='min[$count]' data-id='$w' class = 'select optional form-control' id='min_$count' onclick='ch(this)' required>";
            $loop .= "<option value = '$data->min' selected>$data->min</option>";
            if ($count == 2) {
                $min = 0;
                $max = 20;
            } else {
                $min = $data->min;
            }
            for ($i = $min; $i <= $max; $i++) {

                // if (i > t) {
                //     loop += '<option value="' + i + '" hidden>' + i + '</option>';
                // } else  {

                // loop += '<option value="' + i + '" hidden>' + i + '</option>';
                if ($i != $data->min) {
                    $loop .= "<option value='$i' >$i</option>";
                    
                }
                break;
                // ent = ent+1; 
                // }
                // else{
                //     loop += '<option value="' + i + '" selected>' + i + '</option>';
                // }


                if ($count != 2) {
                    break;
                }
            }

            $loop .= "</select></td>";

            $loop .= "<td><select name='max[$count]' class = 'form-control' data-id='$w_1' id='max_$count' onclick='ch(this)' required>";
            $loop .= "<option value = '$data->max'>$data->max</option>";
            // $max = $data->max;
            for ($i = $min; $i <= $max; $i++) {
                // if (i < t) {
                if ($i != $data->max) {
                    $loop .= "<option value='$i' >$i</option>";
                }
                // } else {
                //     loop += '<option value="' + i + '">' + i + '</option>';
                // }
            }
            if ($count == 2) {
                $idTo = 'add_field';
                $onclick = 'addfield()';
                $class = 'btn btn-success';
                $sign = '+';
            } else {
                $idTo = 'remove';
                $onclick = '';
                $class = 'btn btn-danger';
                $sign = '-';
            }
            $loop .= "</select></td><td><input class='form-control' name='price[$count]' value='$data->price' required/></td><td>Tk</td><td><button type = 'button' id = '$idTo' onclick= '$onclick' class = '$class'>$sign</button></td></tr>";

            $count++;
            $w += 2;
            $w_1 += 2;
        }

        $loop .= "</tbody><tbody id='select_field'></tbody></table>";

        if (request()->ajax()) {
            return response()->json([
                'age_wise_price' => $loop,
                'count' => $count,
                'w' => $w,
                'w_1' => $w_1,
                'array' => $array,
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
    public function update(Request $request)
    {
        dd($request->all());
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

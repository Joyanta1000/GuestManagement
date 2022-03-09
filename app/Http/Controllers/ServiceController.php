<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = collect([
            [
                ["id" => 1, "name" => "Hardik"],
                ["id" => 1, "name" => "Hardik"],
                ["id" => 2, "name" => "Mahesh"],
                ["id" => 3, "name" => "Rakesh"],
            ],
            [
                ["id" => 1, "name" => "Hardik"],
                ["id" => 3, "name" => "Kiran"],
            ]
        ]);

        $data = $data->map(function ($array) {
            return collect($array)->unique('id')->all();
        });

        dd($data);
    }

    public function serviceDetailsShow()
    {

        $service_id = request()->get('service_id');
        $service_name = request()->get('service_name');
        $rand = rand(1, 10);
        $ids_id = request()->get('ids_id');
        $id = request()->get('id');

        //echo $service_name;
        //  $field = '';
        //  if($service_name != null){
        //     $field .="<input type='text' id='$service_id' name='service_name[]' class='form-control' value='$service_name'/>";
        //  }
        //  if($id != null){
        //     $field .="<input type='text' name='id[]' id='$ids_id' class='form-control' value='2'/>";
        //  }
        // echo "<pre>";
        // echo "<input type='text' id='$service_id' name='service_name[]' class='form-control' value='$service_name'/> <input type='text' name='id[]' id='$ids_id' class='form-control' value='$id'/>";
        // echo "</pre>";
        // return response()->json(['service_name' => $service_name, 'id'=>$id]);
        // echo "Service: $service_name, ID: $id";
        // return response()->json(['field' => $field]);

        return view('ServiceManagement.service', compact('service_name', 'id', 'service_id', 'rand', 'ids_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function showFields()
    // {
    //     // $info = collect( [request()->get('info') ] )->map(function ($array) {
    //     //     return collect($array)->unique('id')->all();
    //     // });
    //     // $total = request()->get('total');

    //     $info = request()->get('info');
    //     $total = request()->get('total');


    //     $total_output = $total ? $total : 0;
    //     for ($i = 0; $i < count($info); $i++) {
    //         $operation = $info[$i]['operation'] ? $info[$i]['operation'] : 0;
    //         $c_a = $info[$i]['c_a'] ? $info[$i]['c_a'] : 0;
    //         if ($operation == 1 && $c_a != 0) {
    //             $total = $total + $c_a;
    //         }
    //         if ($operation == 2 && $c_a != 0) {
    //             $total = $total - $c_a;
    //         }
    //         if ($operation == 1 || $operation == 2) {
    //             if ($c_a != 0) {
    //                 $total_output = $total;
    //             }
    //         }
    //     }
    //     //  echo response()->json(['count' => count(request()->get('info')) , 'info' => request()->get('info')]);
    //     echo "<tr><td><input type='text' id='total_another' class='form-control' placeholder='Total' value='$total_output'></td></tr>";
    // }

    public function showFields()
    {
        // $info = collect( [request()->get('info') ] )->map(function ($array) {
        //     return collect($array)->unique('id')->all();
        // });
        // $total = request()->get('total');

        $info = request()->get('info');
        $total = request()->get('total');


        $total_output = $total ? $total : 0;
        for ($i = 0; $i < count($info); $i++) {
            $operation = $info[$i]['operation'] ? $info[$i]['operation'] : 0;
            $c_a = $info[$i]['c_a'] ? $info[$i]['c_a'] : 0;
            if ($operation == 1 && $c_a != 0) {
                $total = $total + $c_a;
            }
            if ($operation == 2 && $c_a != 0) {
                $total = $total - $c_a;
            }
            if ($operation == 1 || $operation == 2) {
                if ($c_a != 0) {
                    $total_output = $total;
                }
            }
        }
        //  echo response()->json(['count' => count(request()->get('info')) , 'info' => request()->get('info')]);
        echo "<tr><td><input type='text' id='total_another' class='form-control' placeholder='Total' value='$total_output'></td></tr>";
    }
    

    public function showSelectFields(){
        $output = "";
        $limit = 25;
        if(request()->get('open') == 1)
        {
            $output .= "<table><thead id='thead'><tr><td>Min. Age</td><td>Max. Age</td><td></td><td>Price</td><td></td></tr></thead><div id='message'></div>";
            $output .= "<tr ><td><select name='min[2]' data-id='2' class = 'select optional form-control' id='min_2' onclick='ch(this)' value='{{old('min[2]')}}' required>";
            $output .= "<option value = '' >Select</option>";
            for($i = 0; $i <= 0; $i++){
                $output .= "<option value='$i'>$i</option>";
            }
            $output .= "</select></td>";
            $output .= "<td><select name='max[2]' class = 'form-control' data-id='3' id='max_2' onclick='ch(this)' value='{{old('max[2]')}}' required>";
            $output .= "<option value = ''>Select</option>";
            for($i = 1; $i <= $limit; $i++){
                $output .= "<option value='$i'>$i</option>";
            }
            $output .= "</select></td><td><input class='form-control' name='price[2]' required/></td><td>Tk</td><td><a id = 'add_field' onclick='addfield()' class = 'btn btn-success'>+</a></td></tr>";
            $output .= "<tbody id='select_field'></tbody></table>";
            
            return response()->json(['output' => $output, 'limit' => $limit]);

        }
        elseif(request()->get('open') == 0)
        {
            
        }
    }

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

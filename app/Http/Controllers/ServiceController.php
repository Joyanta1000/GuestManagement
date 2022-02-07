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
        //
    }

    public function serviceDetailsShow(){
        
        $service_id = request()->get('service_id');
        $service_name = request()->get('service_name');
        $rand = rand(1,10);
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
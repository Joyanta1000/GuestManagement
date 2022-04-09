<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelectionTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->expectsJson()) {

            $to = request('from') ? request('from') : 0;

            $option_1 = '';

            for($i=1; $i<=400; $i++) {
                $option_1 .= '<option value="' . $i . '" '.($i == $to ? "selected" : "").'>' . $i . '</option>';
            }

            $option_2 = '';

            for($i=$to == 0 ? $to+1 : $to; $i<=400; $i++) {
                $option_2 .= '<option value="' . $i . '">' . $i . '</option>';
            }

            return response(['data' => '<div class="col-md-6 mx-auto" style="padding-top: 20px;" ><label for="">Select From</label><select name="" id="select_from" class="form-control select_from"><option value="">Select</option>'.$option_1.'
            </select></div><div class="col-md-6 mx-auto" style="padding-top: 20px;" ><label for="">Select To</label><select name="" id="select_to" class="form-control"><option value="">Select</option>'.$option_2.'</select></div>']);
        }
        return view('NewTask.index');
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

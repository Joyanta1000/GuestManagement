<?php

namespace App\Traits;

use App\AdditionalCost;
use Illuminate\Http\Request;
  
trait CalculationTrait {

    public function calculationStore($request, $id)
    {

        AdditionalCost::where('booking_details_id', $id)->delete();

        $given = $request->input('given');

        foreach ($request->op_type as $key => $value) {
            AdditionalCost::create([
                'booking_details_id' => $id,
                'op_type' => $value,
                'amount' => $request->amount[$key],
                'comment' => $request->comment[$key],
                'given' => $given,
            ]);
        }
        dd('done');

    }

}
<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mac;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MacController extends Controller
{
    public function listMac()
    {
        return response()->json(Mac::all());
    }

    public function addMac(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'uid_no' => 'required', Rule::unique('macs')->where(function ($query) {
                return $query->whereNull('deleted_at');
            }),
            'sn_no' => 'required',
            'company' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $mac = new Mac();
        $mac->uid_no = $request->uid_no;
        $mac->sn_no = $request->sn_no;
        $mac->company = $request->company;

        $mac->save();

        return response()->json($mac, 200);
    }

    public function deleteMac($request)
    {
        $mac = Mac::where('id', $id)->delete();
        return response($mac, 200);
    }
}

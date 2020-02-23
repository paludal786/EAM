<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mouse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MouseController extends Controller
{
    public function listMice()
    {
        return response()->json(Mouse::all());
    }

    public function addMouse(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'uid' => 'required', Rule::unique('mice')->where(function ($query) {
                return $query->whereNull('deleted_at');
            }),
            'sn_no' => 'required|string',
            'company' => 'required|string'
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $mouse = new Mouse();
        $mouse->uid = $request->uid;
        $mouse->sn_no = $request->sn_no;
        $mouse->company = $request->company;

        $mouse->save();

        return response()->json($mouse, 200);
    }

    public function deleteMouse($id)
    {
        $mouse = Mouse::where('id', $id)->delete();
        return response($mouse, 200);
    }
}

<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Keyboard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use SoftDeletes;

class KeyboardController extends Controller
{
    public function listKeyboard()
    {
        return response()->json(Keyboard::all());
    }

    public function addKeyboard(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'uid' => 'required', Rule::unique('keyboards')->where(function ($query) {
                return $query->whereNull('deleted_at');
            }),
            'sn_no' => 'required|string',
            'company' => 'required|string'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $keyboard = new Keyboard();
        $keyboard->uid = $request->uid;
        $keyboard->sn_no = $request->sn_no;
        $keyboard->company = $request->company;

        $keyboard->save();

        return response()->json($keyboard, 200);
    }

    public function deleteKeyboard($id)
    {
        $keyboard = Keyboard::where('id', $id)->delete();
        return response($keyboard, 200);
    }
}

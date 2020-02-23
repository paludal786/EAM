<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Desktop;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DesktopController extends Controller
{
    public function desktopList()
    {
        return response()->json(Desktop::all());
    }

    public function addDesktop(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'uid_no' => [
                'required',
                Rule::unique('desktops')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })
            ],
            'sn_no' => 'required|string',
            'company' => 'required|string'

        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $desktop = new Desktop();
        $desktop->uid_no = $request->uid_no;
        $desktop->sn_no = $request->sn_no;
        $desktop->company = $request->company;

        $desktop->save();

        return response()->json($desktop, 200);
    }

    public function deleteDesktop($id)
    {
        $desktop = Desktop::where('id', $id)->delete();
        return response($desktop, 200);
    }
}

<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desktop;
use App\Models\Employee;
use App\Models\Keyboard;
use App\Models\Mac;
use App\Models\Mouse;

class DashboardController extends Controller
{
    //

    public function DashboardMetaApi(Request $request)
    {
        $desktop = Desktop::whereNull('deleted_at')->count();
        $employee = Employee::whereNull('deleted_at')->count();
        $keyboard = Keyboard::whereNull('deleted_at')->count();
        $mac = Mac::whereNull('deleted_at')->count();
        $mouse = Mouse::whereNull('deleted_at')->count();

        $dashbaord_data = [
            'desktop' => $desktop,
            'employee' => $employee,
            'keyboard' => $keyboard,
            'mac' => $mac,
            'mouse' => $mouse
        ];

        return response()->json($dashbaord_data, 200);

    }
}

<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Keyboard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function listEmployee()
    {
        return response(Employee::all());
    }

    public function addEmployee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'emp_id' => [
                'required',
                Rule::unique('employees')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'keyboard_id' => [
                'required',
                Rule::exists('keyboards', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }), Rule::unique('employees')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'mouse_id' => [
                'required',
                Rule::exists('mice', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }), Rule::unique('employees')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'desktop_id' => [
                'required',
                Rule::exists('desktops', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }), Rule::unique('employees')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'mac_id' => [
                'required',
                Rule::exists('macs', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }), Rule::unique('employees')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ]
        ]);

        if ($validator->fails()) {
            return response($validator->errors()->first(), 422);
        }


        $employee = new Employee();

        $employee->name = $request->name;
        $employee->emp_id = $request->emp_id;
        $employee->keyboard_id = $request->keyboard_id;
        $employee->mouse_id = $request->mouse_id;
        $employee->desktop_id = $request->desktop_id;
        $employee->mac_id = $request->mac_id;

        $employee->save();



        return response($employee, 200);
    }

    public function editEmployee(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'emp_id' => [
                'required',
                Rule::unique('employees')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'keyboard_id' => [
                'required',
                Rule::exists('keyboards', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }), Rule::unique('employees')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'mouse_id' => [
                'required',
                Rule::exists('mice', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }), Rule::unique('employees')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'desktop_id' => [
                'required',
                Rule::exists('desktops', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }), Rule::unique('employees')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'mac_id' => [
                'required',
                Rule::exists('macs', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }), Rule::unique('employees')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ]
        ]);

        if ($validator->fails()) {
            return response($validator->errors()->first(), 422);
        }

        $employee =  Employee::FindOrFail($id);
        $employee->name = $request->name;
        $employee->emp_id = $request->emp_id;
        $employee->keyboard_id = $request->keyboard_id;
        $employee->mouse_id = $request->mouse_id;
        $employee->desktop_id = $request->desktop_id;
        $employee->mac_id = $request->mac_id;

        $employee->save();

        return response($employee, 200);
    }

    public function listPerticularEmployee(Request $request, $id)
    {
        $listPerticular = Employee::FindOrFail($id);
        return response($listPerticular, 200);
    }

    public function deleteEmployee($id)
    {
        $deleteEmployee = Employee::where('id', $id)->delete();
        return response($deleteEmployee, 200);
    }
}

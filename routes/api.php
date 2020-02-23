<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees', 'WebControllers\EmployeeController@listEmployee');
Route::post('/employee/add', 'WebControllers\EmployeeController@addEmployee');
Route::post('/employee/{id}/edit', 'WebControllers\EmployeeController@editEmployee');
Route::get('/employee/{id}/list', 'WebControllers\EmployeeController@listPerticularEmployee');
Route::post('/employee/{id}/delete', 'WebControllers\EmployeeController@deleteEmployee');


Route::get('/desktops', 'WebControllers\DesktopController@desktopList');
Route::post('/desktop/add', 'WebControllers\DesktopController@addDesktop');
Route::post('/desktop/{id}/delete', 'WebControllers\DesktopController@deleteDesktop');


Route::get('/keyboards', 'WebControllers\KeyboardController@listKeyboard');
Route::post('/keyboard/add', 'WebControllers\KeyboardController@addKeyboard');
Route::post('/keyboard/{id}/delete', 'WebControllers\KeyboardController@deleteKeyboard');


Route::get('/mice', 'WebControllers\MouseController@listMice');
Route::post('/mouse/add', 'WebControllers\MouseController@addMouse');
Route::post('/mouse/{id}/delete', 'WebControllers\MouseController@deleteMouse');

Route::get('/macs', 'WebControllers\MacController@listMac');
Route::post('/mac/add', 'WebControllers\MacController@addMac');
Route::post('/mac/{id}/delete', 'WebControllers\MacController@deleteMac');

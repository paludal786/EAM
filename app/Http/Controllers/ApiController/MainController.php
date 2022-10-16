<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class MainController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'message' => 'validation error'], 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        // 201 status code used to show created data
        return response()->json(['data' => $user, 'message' => 'User Created Successfully !..'], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'remember_me' => 'boolean'
        ]);

        $userCredentials = request(['email', 'password']);
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['message' => 'Unauthrized'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('User Personal Acess Token');
        $token = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(2);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateString()
        ], 200);
    }

    public function logout(Request $request)
    {
        $tokenStatus = $request->user()->token()->revoked;
        // if (!$tokenStatus) {
        //     $request->user()->token()->revoke();
        //     return response()->json(['message' => 'Token Expired !..'], 200);
        // }
        return response()->json(['message' => 'Logout Successful !..'], 200);
    }

    public function profile(Request $request)
    {

        // $tokenStatus = $request->user()->token()->revoked;
        // if (!$tokenStatus) {
        //     return response()->json(['message' => 'Please Login To Get Data'], 200);
        // }
        return response()->json(['data' => $request->user(), 'message' => 'user data'], 200);
    }
}

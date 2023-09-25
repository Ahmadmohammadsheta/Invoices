<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ResponseTrait as TraitResponseTrait;

class LoginUserController extends Controller
{
    use TraitResponseTrait;
    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ],[
            'name.required' => 'required',
            'email.required' => 'required',
            'password.required' => 'required',
            'password.min' => 'min is 6',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        // Save the user to the database
        if ($user->save()) {

            // Return a success response
            return response()->json([
                'data' => $user,
                'message' => 'User created successfully!',
            ], 201);

        }

        // Return a failed response
        return response()->json([
            'message' => $request->email,
        ], 202);
        
    }
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        if($user = Auth::attempt(['email' => $request->input('email'), 'password' => bcrypt($request->input('password'))])){
            // Return a success response
            return response()->json([
                'data' => $user,
                'message' => 'User login successfully!',
            ], 201);
            // return $this->sendResponse($success, 'تم تسجيل الدخول بنجاح.', 200);
        }

        // Return a failed response
        return response()->json([
            'message' => $request->email,
        ], 202);
    }
}

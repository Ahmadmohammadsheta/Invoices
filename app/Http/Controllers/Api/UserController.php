<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ResponseTrait as TraitResponseTrait;

class UserController extends Controller
{
    use TraitResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return json_encode($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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

            $success['remember_token']     =  $user->createToken('user')->plainTextToken;
            $success['user']      =  $user;
            // Return a success response
            return $this->sendResponse($success, 'تم تسجيل الدخول بنجاح.', 201);

        }

        // Return a failed response
        return response()->json([
            'message' => 'User created failed!',
        ], 202);
    }

    /**
     * login user.
     */
    public function login(Request $request)
    {
        $user = user::Where(['email' => $request->input('email')])->first();

        // Get the user's plain text password from the request.
        $password = $request->input('password');

        // Get the user's hashed password from the database.
        $hashedPassword = $user->password;
        // Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);

        if(Hash::check($password, $hashedPassword)){
            $success['user'] =  $user;
            $success['remember_token'] =  $user->createToken('user')->plainTextToken;

            return $this->sendResponse($success, 'تم تسجيل الدخول بنجاح.', 201);
        }

        return $this->sendError('Unauthorised.', ['error' => 'بيانات غير مطابقة'], 401);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

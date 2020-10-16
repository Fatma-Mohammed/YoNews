<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\userRegistered;
use App\User;
use App\Exceptions;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('throttle:4');
        $this->middleware(['auth:sanctum'])->only(['logout']);

    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'     => ['required', 'string'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $password = \Str::random(8);

        $createdUser = User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'password' => \Hash::make($password),
        ]);

        //Fire notification with password
        $createdUser->notify(new UserRegistered($password));

        return response(['result' => 'success'], 200)
                  ->header('Content-Type', 'application/json');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|email',
            'password'    => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        
        //check user password 
        if (!$user || !\Hash::check($request->password, $user->password)) {
            dd('test');
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        
        //check if the user does not has a saved token create one 
        $token = $user->tokens()->where('name', $request->device_name)->first();
		if (!$token)
			return $user->createToken($request->device_name)->plainTextToken;
        //update existing token
		$token->update([
			'token' => hash('sha256', $plainTextToken = \Str::random(80))
		]);

		return $plainTextToken;
        
    }


    public function logout(Request $request)
    {
        return $request->user()->currentAccessToken()->delete();
    }
}

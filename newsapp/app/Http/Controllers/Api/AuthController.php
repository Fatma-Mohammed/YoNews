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
        // $this->middleware('throttle:4');
        $this->middleware(['auth:sanctum'])->only(['logout']);

    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'     => ['required', 'string'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birth'    => ['required', 'date'],
        ]);

        $password = \Str::random(8);

        $createdUser = User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'birth_date'=> $validatedData['birth'],
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
        ]);

        $user = User::where('email', $request->email)->first();
        
        //check user password 
    
        if (\Auth::attempt($request->only('email', 'password'))) { 
            // Authentication passed... 
            return response(auth()->user(),201);
         }
         else{
             return response('Invalid data',401);
         }
        
        
            
    }


    public function logout(Request $request)
    {
        return $request->user()->currentAccessToken()->delete();
    }
}

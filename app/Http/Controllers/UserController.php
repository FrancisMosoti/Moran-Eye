<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Rules\PhoneValidation;
use App\Notifications\RegisterSuccess;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)    
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Response $response)
    {
        
        // validation
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255|min:3',
            'email' => ['required','email',Rule::unique('users', 'email'), ],
            'phone' => ['required','numeric', new PhoneValidation()],
            'role' => ['required'],
            'password' => ['required','confirmed'],
           
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'phone' => validatePhone($request->phone)['phone'],
            'password' => $request->password
        ]);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
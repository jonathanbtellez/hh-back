<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'id_number' => $request->id_number,
            'name' => $request->name,
            'second_name' => $request->second_name,
            'last_name' => $request->last_name,
            'surname' => $request->surname,
            'name' => $request->name,
            'email' => $request->email,
            'number_phone' => $request->number_phone,
            'location' => $request->location,
            'type' => $request->type,
            'password' => $request->password ? $request->password : $request->id_number,
        ]);

        $token = $user->createToken('token')->plainTextToken;
        Auth::login($user);
        $data = ['token' => $token, 'user' => $user];
        return response()->json($data, 201);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bmi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    public function store(RegisterRequest $request): JsonResponse {

        
        $validatedUser =  $request->validated();
        
        $user = User::create($validatedUser);

        $validatedUser["user_id"] = $user->id;
        $validatedUser["waktu"] = date('Y-m-d');

        Bmi::create($validatedUser);

        return response()->json([
            "id" => $user->id,
            "status" => "success",
            "message" => "User berhasil ditambahkan"
        ], 201);
    }

    public function login(Request $request) : JsonResponse {
        
        if(auth()->attempt($request->only("email", "password"))){
            $user = auth()->user();
            $token = $user->createToken("api_token")->plainTextToken;

            return response()->json([
                "status" => "success",
                "message" => "Login berhasil",
                "token" => $token
            ], 201);
        }

        return response()->json([
            "status" => "error",
            "message" => "Username atau password salah"
        ], 401);

    }

    public function logout() : JsonResponse{
        auth()->user()->tokens()->delete();

        return response()->json([
            "message" => "Logout berhasil"
        ], 201);
    }

    public function profile() : JsonResponse{
        $user = auth()->user();

        // return (new UserResource($user))->response()->setStatusCode(201);
        return response()->json([
            "status" => "success",
            "data" => new UserResource($user),
            "summary" => new SummaryResource($user)
        ], 201);
    }

}

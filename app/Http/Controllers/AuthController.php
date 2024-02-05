<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function verify($id, Request $request){
        if (!$request->hasValidSignature()){
            return response()->json([
                'status' => 'error',
                'message' => 'Varify email fails'
            ], 400);
        }

        $user = User::find($id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use App\Http\Requests\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    private $otp;
    public function __construct(){
        $this->otp = new Otp;
    }
    public function email_verification(EmailVerificationRequest $request) {
        $user = auth()->user();
        $otp2 = $this->otp->validate($user->email, $request->otp);
        if(!$otp2->status){
            return response()->json([
                'error' => $otp2
            ], 401);
        }
       
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Email berhasil diverifikasi'
        ], 201);
    }
}

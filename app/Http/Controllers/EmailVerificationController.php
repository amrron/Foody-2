<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Verified;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\EmailVerificationRequest;
use App\Notifications\EmailVerificationNotification;

class EmailVerificationController extends Controller
{
    private $otp;
    public function __construct(){
        $this->otp = new Otp;
    }
    public function email_verification(EmailVerificationRequest $request) {
        $user = auth()->user();
        $otp2 = $this->otp->validate($user->email, $request->otp);
        if($otp2->status == 'error'){
            return response()->json($otp2, 401);
        }
       
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Email berhasil diverifikasi'
        ], 201);
    }

    public function resend_otp() {
        $user = auth()->user();
        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email sudah terverifikasi'
            ], 400);
        }

        $otp = DB::table('otps')->where('identifier', $user->email)->latest();

        if ($otp){
            $otp->delete();
        }

        $user->notify(new EmailVerificationNotification());

        return response()->json([
            'status' => 'success',
            'message' => 'Otp telah dikirim '
        ], 201);
    }
}

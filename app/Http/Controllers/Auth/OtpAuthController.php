<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Support\ProfileGenerator;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\OtpCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Services\FonnteService;
use App\Mail\OtpEmail;

class OtpAuthController extends Controller
{
    /* ======================================================
     | EMAIL REGISTER
     ====================================================== */

    public function registerEmailRequest(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        if (Client::where('email', $request->email)->exists()) {
            return response()->json(['message' => 'Email already registered'], 409);
        }

        $this->sendOtp('email', $request->email);

        return response()->json(['message' => 'OTP sent for registration']);
    }

    public function registerEmailVerify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required'
        ]);

        $this->verifyOtp('email', $request->email, $request->otp);

        $profile = ProfileGenerator::fromEmail($request->email);

        $client = Client::create([
            'email' => $request->email,
            'email_verified_at' => now(),
            'display_name' => $profile['displayName'],
            'username' => $profile['username'],
            'avatar' => $profile['avatar'],
            'profile_completed' => true,
        ]);

        Auth::login($client);
    }

    /* ======================================================
     | EMAIL LOGIN
     ====================================================== */

    public function loginEmailRequest(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        if (! Client::where('email', $request->email)->exists()) {
            return response()->json([
                'message' => 'Account not found, please register'
            ], 404);
        }

        $this->sendOtp('email', $request->email);

        return response()->json(['message' => 'OTP sent for login']);
    }

    public function loginEmailVerify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required'
        ]);

        $this->verifyOtp('email', $request->email, $request->otp);

        $client = Client::where('email', $request->email)->firstOrFail();

        Auth::login($client);

        return response()->json([
            'status' => 'success',
            'profile_completed' => (bool) $client->profile_completed
        ]);
    }

    /* ======================================================
     | PHONE REGISTER
     ====================================================== */

    public function registerPhoneRequest(Request $request)
    {
        $request->validate(['phone' => 'required|string']);

        if (Client::where('phone', $request->phone)->exists()) {
            return response()->json(['message' => 'Phone already registered'], 409);
        }

        $this->sendOtp('phone', $request->phone);

        return response()->json(['message' => 'OTP sent for registration']);
    }

    public function registerPhoneVerify(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'otp'   => 'required'
        ]);

        $this->verifyOtp('phone', $request->phone, $request->otp);

        $profile = ProfileGenerator::fromPhone($request->phone);

        $client = Client::create([
            'phone' => $request->phone,
            'phone_verified_at' => now(),
            'display_name' => $profile['display_name'],
            'username' => $profile['username'],
            'avatar' => $profile['avatar'],
            'profile_completed' => true,
        ]);



        Auth::login($client);

    }

    /* ======================================================
     | PHONE LOGIN
     ====================================================== */

    public function loginPhoneRequest(Request $request)
    {
        $request->validate(['phone' => 'required|string']);

        if (! Client::where('phone', $request->phone)->exists()) {
            return response()->json([
                'message' => 'Account not found, please register'
            ], 404);
        }

        $this->sendOtp('phone', $request->phone);

        return response()->json(['message' => 'OTP sent for login']);
    }

    public function loginPhoneVerify(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'otp'   => 'required'
        ]);

        $this->verifyOtp('phone', $request->phone, $request->otp);

        $client = Client::where('phone', $request->phone)->firstOrFail();

        Auth::login($client);

        return response()->json([
            'status' => 'success',
            'profile_completed' => (bool) $client->profile_completed
        ]);
    }

    /* ======================================================
     | SHARED OTP LOGIC (TIDAK DIUBAH)
     ====================================================== */

    private function sendOtp(string $type, string $target): void
    {
        OtpCode::where('type', $type)
            ->where('target', $target)
            ->delete();

        $otp = random_int(100000, 999999);

        OtpCode::create([
            'type' => $type,
            'target' => $target,
            'code' => Hash::make($otp),
            'attempts' => 0,
            'expires_at' => now()->addMinutes(5),
        ]);

        if ($type === 'email') {
            Mail::to($target)->send(new OtpEmail($otp));
        } else {
            FonnteService::send($target, "Your OTP code: $otp");
        }   
    }

    private function verifyOtp(string $type, string $target, string $otp): void
    {
        $record = OtpCode::where('type', $type)
            ->where('target', $target)
            ->latest()
            ->first();

        if (! $record) {
            throw new \Exception('OTP not found');
        }

        if ($record->expires_at->isPast()) {
            $record->delete();
            throw new \Exception('OTP expired');
        }

        if ($record->attempts >= 5) {
            $record->delete();
            throw new \Exception('Too many attempts');
        }

        if (! Hash::check($otp, $record->code)) {
            $record->increment('attempts');
            throw new \Exception('Invalid OTP');
        }

        $record->delete();
    }

    
}

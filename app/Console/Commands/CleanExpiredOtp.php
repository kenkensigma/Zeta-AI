<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OtpCode;

class CleanExpiredOtp extends Command
{
    protected $signature = 'otp:clean';
    protected $description = 'Delete expired OTP codes';

    public function handle(): void
    {
        OtpCode::where('expires_at', '<', now())->delete();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class OtpCode extends Model
{
    protected $table = 'otp_codes';

    protected $fillable = [
        'type',
        'target',
        'code',
        'expires_at',
        'attempts',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function isExpired(): bool
    {
        return Carbon::now()->greaterThan($this->expires_at);
    }
}

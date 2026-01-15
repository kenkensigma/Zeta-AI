<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;

    protected $table = 'clients';

    // semua kolom boleh diisi
    protected $fillable = [
        'email',
        'phone',
        'google_id',
        'email_verified_at',
        'phone_verified_at',
        'display_name',
        'username',
        'avatar',
        'profile_completed',
        'profile_prompted'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'profile_completed' => 'boolean',
        'profile_prompted' => 'boolean',
    ];

     protected $appends = ['avatar_url']; 

/* =====================================
     | ACCESSORS
     ===================================== */
    public function getAvatarUrlAttribute()
    {
        // Avatar custom
        if ($this->avatar) {
            return asset($this->avatar);
        }
        
        // Gravatar jika ada email
        if ($this->email) {
            $hash = md5(strtolower(trim($this->email)));
            return "https://www.gravatar.com/avatar/{$hash}?d=identicon&s=100";
        }
        
        // Default
        return asset('/images/avatars/agent-default.png');
    }

    public function getDisplayNameAttribute($value)
    {
        return $value ?: ($this->email ?: $this->phone ?: 'Unknown Agent');
    }

    // Accessor untuk username yang aman
    public function getUsernameAttribute($value)
    {
        return $value ?: 'agent_' . rand(10000, 99999);
    }

    /* =====================================
     | DEFAULT PROFILE GENERATOR
     ===================================== */
    public static function defaultProfile(?string $email, ?string $phone): array
    {
        // REGISTER VIA EMAIL / GOOGLE
        if ($email) {
            $name = explode('@', $email)[0];

            return [
                'display_name' => ucwords(str_replace(['.', '_'], ' ', $name)),
                'username' => strtolower($name),
                'avatar' => '/images/avatars/agent-default.png',
                'profile_completed' => false,
                'profile_prompted' => false,
            ];
        }

        // REGISTER VIA PHONE
        return [
            'display_name' => 'Unknown Agent',
            'username' => 'agent_' . rand(10000, 99999),
            'avatar' => '/images/avatars/agent-default.png',
            'profile_completed' => false,
            'profile_prompted' => false,
        ];
    }

    /* =====================================
     | VERIFY HELPERS (PUNYA KAMU)
     ===================================== */
    public function markEmailVerified(): void
    {
        $this->forceFill([
            'email_verified_at' => now(),
        ])->save();
    }

    public function markPhoneVerified(): void
    {
        $this->forceFill([
            'phone_verified_at' => now(),
        ])->save();
    }
}
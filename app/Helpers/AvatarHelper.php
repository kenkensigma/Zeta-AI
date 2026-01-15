<?php

namespace App\Helpers;

class AvatarHelper
{
    public static function getAvatarUrl($user)
    {
        if (!$user) {
            return asset('/images/avatars/agent-default.png');
        }
        
        // Avatar custom
        if ($user->avatar) {
            return asset($user->avatar);
        }
        
        // Gravatar
        if ($user->email) {
            $hash = md5(strtolower(trim($user->email)));
            return "https://www.gravatar.com/avatar/{$hash}?d=identicon&s=100";
        }
        
        // Default
        return asset('/images/avatars/agent-default.png');
    }
}
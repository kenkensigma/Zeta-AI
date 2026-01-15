<?php

namespace App\Support;

use App\Models\Client;
use Illuminate\Support\Str;

class ProfileGenerator
{
    public static function fromEmail(string $email): array
    {
        $namePart = explode('@', $email)[0]; // mionaruse

        $displayName = collect(explode('.', $namePart))
            ->map(fn($n) => ucfirst($n))
            ->implode(' ');

        if (!str_contains($displayName, ' ')) {
            $displayName = ucfirst(substr($namePart, 0, 3)) . ' ' . ucfirst(substr($namePart, 3));
        }

        $username = self::uniqueUsername($namePart);

        $avatar = self::randomAvatar();

        return compact('displayName', 'username', 'avatar');
    }

    public static function fromPhone(string $phone): array
    {
        return [
            'display_name' => 'Unknown Agent',
            'username'     => self::uniqueUsername('agent'),
            'avatar'       => self::randomAvatar(),
        ];
    }

    private static function generateAgentUsername()
    {
        do {
            $name = 'agent' . rand(1000, 9999);
        } while (\App\Models\User::where('username', $name)->exists());

        return $name;
    }

    protected static function uniqueUsername(string $base): string
    {
        $username = strtolower($base);
        $original = $username;
        $i = 1;

        while (Client::where('username', $username)->exists()) {
            $username = $original . rand(10, 99);
            $i++;
        }

        return $username;
    }

    public static function randomAvatar(): string
    {
        $avatars = [
            'avatars/agent-male-1.png',
            'avatars/agent-male-2.png',
            'avatars/agent-female-1.png',
            'avatars/agent-female-2.png',
            'avatars/agent-anonymous.png',
        ];

        return $avatars[array_rand($avatars)];
    }
}

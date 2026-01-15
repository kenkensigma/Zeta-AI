<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FonnteService
{
    public static function send(string $phone, string $message): bool
    {
        $response = Http::withHeaders([
            'Authorization' => config('services.fonnte.token'),
        ])->post('https://api.fonnte.com/send', [
            'target' => $phone,
            'message' => $message,
            'countryCode' => '62',
        ]);

        return $response->successful();
    }
}

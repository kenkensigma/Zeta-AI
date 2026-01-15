<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /* ================================
     | CHECK PROFILE STATUS
     ================================= */
    public function status()
    {
        $user = auth()->user();

        return response()->json([
            'show_popup' => ! $user->profile_prompted,
            'profile' => [
                'display_name' => $user->display_name,
                'username' => $user->username,
                'avatar' => $user->avatar,
            ]
        ]);
    }

    /* ================================
     | SAVE PROFILE
     ================================= */
    public function complete(Request $request)
    {
        $request->validate([
            'display_name' => 'nullable|string|max:50',
            'username' => 'nullable|alpha_dash|unique:clients,username,' . auth()->id(),
            'avatar' => 'nullable|string',
        ]);

        $user = auth()->user();

        $user->update([
            ...array_filter($request->only('display_name', 'username', 'avatar')),
            'profile_completed' => true,
            'profile_prompted' => true,
        ]);

        return response()->json([
            'message' => 'Profile saved'
        ]);
    }

    /* ================================
     | SKIP PROFILE
     ================================= */
    public function skip()
    {
        auth()->user()->update([
            'profile_prompted' => true
        ]);

        return response()->json([
            'message' => 'Profile skipped'
        ]);
    }

    /* ================================
     | CHECK USERNAME AVAILABILITY
     ================================= */

     public function checkUsername(Request $request)
{
    $request->validate([
        'username' => 'required|alpha_dash'
    ]);

    $exists = Client::where('username', $request->username)
        ->where('id', '!=', auth()->id())
        ->exists();

    if (! $exists) {
        return response()->json(['available' => true]);
    }

    return response()->json([
        'available' => false,
        'suggestions' => [
            $request->username . rand(10,99),
            $request->username . rand(100,999),
        ]
    ]);
}

}



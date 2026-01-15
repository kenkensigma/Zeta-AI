<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('display_name')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('avatar')->nullable();

            // kontrol popup
            $table->boolean('profile_completed')->default(false);
            $table->boolean('profile_prompted')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn([
                'display_name',
                'username',
                'avatar',
                'profile_completed',
                'profile_prompted'
            ]);
        });
    }
};


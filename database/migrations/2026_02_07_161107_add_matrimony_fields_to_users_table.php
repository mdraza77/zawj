<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender', ['male', 'female'])->after('name')->nullable();
            $table->date('date_of_birth')->after('gender')->nullable();
            $table->string('phone', 15)->unique()->after('email')->nullable();
            $table->timestamp('phone_verified_at')->after('phone')->nullable();
            $table->enum('account_for', ['self', 'son', 'daughter', 'relative'])->default('self');
            $table->boolean('is_verified')->default(false)->after('email_verified_at');
            $table->boolean('is_profile_public')->default(true)->after('is_verified');
            $table->enum('status', ['active', 'deactivated', 'blocked'])->default('active')->after('is_profile_public');
            $table->timestamp('last_seen_at')->nullable();
            $table->tinyInteger('profile_completion')->default(0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['gender', 'date_of_birth', 'phone', 'is_verified', 'is_profile_public', 'status', 'last_seen_at', 'profile_completion']);
        });
    }
};

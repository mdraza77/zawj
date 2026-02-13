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
            // Location Details
            $table->string('country')->default('India')->nullable();
            $table->string('state')->default('West Bengal')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('pincode')->nullable();

            // Religious Details
            $table->enum('sect', ['Sunni', 'Shia'])->nullable();
            $table->string('sub_sect')->nullable();
            $table->enum('namaz_frequency', [
                'Always',
                'Usually',
                'Sometimes',
                'Never',
                'Prefer not to say'
            ])->default('Always')->after('sub_sect')->nullable();
            $table->integer('namaz_count')->default(0)->nullable();

            // Personal/Family Details
            $table->decimal('salary', 15, 2)->nullable();
            $table->string('family_members')->default('Single Child')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'country',
                'state',
                'city',
                'district',
                'pincode',
                'namaz_frequency',
                'namaz_count',
                'sect',
                'sub_sect',
                'salary',
                'family_members',
            ]);
        });
    }
};

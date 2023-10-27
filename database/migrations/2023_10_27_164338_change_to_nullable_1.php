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
        Schema::table('register_users', function (Blueprint $table) {
            $table->boolean('area_hakata')->nullable(true)->change();
            $table->boolean('area_chuo')->nullable(true)->change();
            $table->boolean('area_oonojo')->nullable(true)->change();
            $table->boolean('area_tosu')->nullable(true)->change();
            $table->boolean('area_saga')->nullable(true)->change();
            $table->boolean('area_kumamoto')->nullable(true)->change();
            $table->boolean('registration_job_introduction')->nullable(true)->change();
            $table->boolean('registration_worker_dispatch')->nullable(true)->change();
            $table->string('remarks')->nullable(true)->change();
            $table->string('admin_remarks')->nullable(true)->change();
            $table->string('home_tel')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('register_users', function (Blueprint $table) {
            $table->boolean('area_hakata')->nullable(false)->change();
            $table->boolean('area_chuo')->nullable(false)->change();
            $table->boolean('area_oonojo')->nullable(false)->change();
            $table->boolean('area_tosu')->nullable(false)->change();
            $table->boolean('area_saga')->nullable(false)->change();
            $table->boolean('area_kumamoto')->nullable(false)->change();
            $table->boolean('registration_job_introduction')->nullable(false)->change();
            $table->boolean('registration_worker_dispatch')->nullable(false)->change();
            $table->string('remarks')->nullable(false)->change();
            $table->string('admin_remarks')->nullable(false)->change();
            $table->string('home_tel')->nullable(false)->change();
        });
    }
};

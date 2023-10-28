<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Prompts\Table;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('register_users', function (Blueprint $table) {
            $table->string('gender')->nullable();
            $table->integer('postcode');
            $table->string('address');
            $table->integer('tel');
            $table->string('email');
            $table->string('jobtype');
            $table->boolean('area_hakata');
            $table->boolean('area_chuo');
            $table->boolean('area_oonojo');
            $table->boolean('area_tosu');
            $table->boolean('area_saga');
            $table->boolean('area_kumamoto');
            $table->boolean('registration_job_introduction');
            $table->boolean('registration_worker_dispatch');
            $table->string('facepic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('register_users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('postcode');
            $table->dropColumn('address');
            $table->dropColumn('tel');
            $table->dropColumn('email');
            $table->dropColumn('jobtype');
            $table->dropColumn('area_hakata');
            $table->dropColumn('area_chuo');
            $table->dropColumn('area_oonojo');
            $table->dropColumn('area_tosu');
            $table->dropColumn('area_saga');
            $table->dropColumn('area_kumamoto');
            $table->dropColumn('registration_job_introduction');
            $table->dropColumn('registration_worker_dispatch');
            $table->dropColumn('facepic');
        });
    }
};

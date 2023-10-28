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
            $table->string('furi');
            $table->date('birthday');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('register_users', function (Blueprint $table) {
            $table->dropColumn('furi');
            $table->dropColumn('birthday');
        });
    }
};

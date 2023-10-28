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
            $table->tinyInteger('status')->after('updated_at')->default(null);
            $table->string('remarks');
            $table->string('admin_remarks');
            $table->string('home_tel')->after('tel');

            $table->string('tel')->change();
            $table->string('postcode')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('register_users', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('remarks');
            $table->dropColumn('admin_remarks');
            $table->dropColumn('home_tel');

            $table->integer('tel')->change();
            $table->integer('postcode')->change();
        });
    }
};

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
        Schema::table('capacitaciones', function (Blueprint $table) {
        $table->string('plantilla')->nullable();
        $table->string('firma')->nullable();
        $table->string('instructor')->nullable();
        $table->string('cargo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('capacitaciones', function (Blueprint $table) {
            $table->dropColumn(['plantilla', 'firma', 'instructor', 'cargo']);
        });
    }
};

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
        Schema::create('families', function (Blueprint $table) {
            $table->id('fid');
            $table->text('rooms')->nullable();
            $table->text('fullname')->nullable();
            $table->text('building')->nullable();
            $table->text('check_in')->nullable();
            $table->text('check_out')->nullable();
            $table->text('room_type')->nullable();
            $table->boolean('linked')->default(false);
            $table->text('package_type')->nullable();
            $table->integer('family_size')->default(0);
            $table->integer('start')->default(0);
            $table->integer('end')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};

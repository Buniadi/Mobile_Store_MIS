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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('battery_level');
            $table->string('model');
            $table->string('photo');
            $table->string('cam_pexel');
            $table->string('fingerprint');
            $table->string('face');
            $table->string('power_type');
            $table->string('memory');
            $table->string('camera_n');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};

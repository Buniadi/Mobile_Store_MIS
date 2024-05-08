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
            $table->unsignedBigInteger('company_id');
            $table->string('battery_level');
            $table->string('model');
            $table->string('photo')->nullable();
            $table->integer('cam_pexel');
            $table->enum('fingerprint',['0','1'])->default('0');
            $table->enum('face',['0','1'])->default('0');
            $table->string('power_type');
            $table->string('memory');
            $table->string('camera_n');
            $table->string('ram');
            $table->enum('status',['0','1'])->default('1');
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

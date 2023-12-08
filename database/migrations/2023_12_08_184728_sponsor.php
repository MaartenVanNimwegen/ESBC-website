<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('sponsor', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('picture_location', 511);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('sponsor');
    }
};

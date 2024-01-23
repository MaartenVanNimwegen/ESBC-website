<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('trainingen', function (Blueprint $table) {
            $table->id();
            $table->integer('team_id');
            $table->integer('day');
            $table->time('start');
            $table->time("end");
            $table->string("trainer");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trainingen');
    }
};

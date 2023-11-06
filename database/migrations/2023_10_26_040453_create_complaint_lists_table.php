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
        Schema::create('complaint_lists', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('site');
            $table->string('complaints');
            $table->string('complaints_image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('page')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaint_lists');
    }
};
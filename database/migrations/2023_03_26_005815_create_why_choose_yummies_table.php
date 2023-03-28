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
        Schema::create('why_choose_yummies', function (Blueprint $table) {
            $table->id();
            $table->string('title1');
            $table->text('desc1');
            $table->string('title2');
            $table->text('desc2');
            $table->string('title3');
            $table->text('desc3');
            $table->string('title4');
            $table->text('desc4');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_yummies');
    }
};

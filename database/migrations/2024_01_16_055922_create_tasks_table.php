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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('review')->nullable();
            $table->unsignedBigInteger('title');
            $table->foreign('lead_user')->references('id')->on('leads')->onDelete('cascade');
            $table->string('received_amount')->nullable();
            $table->string('numberOfLead');
            $table->unsignedBigInteger('lead_user');
            $table->foreign('lead_user')->references('id')->on('leads')->onDelete('cascade');
            $table->unsignedBigInteger('lead_assist');
            $table->foreign('lead_assist')->references('id')->on('leads')->onDelete('cascade');
            $table->string('status');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

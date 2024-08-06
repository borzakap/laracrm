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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('action_id')->nullable(false)->constrained('actions');
            $table->foreignId('phone_id')->nullable(false)->constrained('phones');
            $table->integer('internal_id')->nullable();
            $table->integer('external_id')->nullable();
            $table->integer('billsec')->nullable();
            $table->integer('waitsec')->nullable();
            $table->integer('type');
            $table->integer('disposition');
            $table->dateTime('started_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calls');
    }
};

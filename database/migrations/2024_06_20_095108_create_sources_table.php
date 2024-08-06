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
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('action_id')->nullable(false)->constrained('actions');
            $table->char('domain', 255)->nullable();
            $table->char('page', 255)->nullable();
            $table->char('referral', 255)->nullable();
            $table->char('source', 255)->nullable();
            $table->char('medium', 255)->nullable();
            $table->char('campaign', 255)->nullable();
            $table->char('term', 255)->nullable();
            $table->char('content', 255)->nullable();
            $table->char('gclid', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sources');
    }
};

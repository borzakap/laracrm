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
        Schema::create('contact_lead', function (Blueprint $table) {
            $table->foreignId('contact_id')->nullable(false)->constrained('contacts');
            $table->foreignId('lead_id')->nullable(false)->constrained('leads');
            $table->boolean('default');
            $table->timestamps();
            $table->unique(['contact_id', 'lead_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_lead');
    }
};

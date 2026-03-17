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
        Schema::create('comiters', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('affiliation');
            $table->string('session')->nullable();
            $table->string('country')->nullable();
            $table->longText('bio');
            $table->string('image');
            $table->foreignId('typecomite_id')->constrained('typecomites')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comiters');
    }
};

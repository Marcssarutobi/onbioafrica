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
        Schema::create('abstractdatas', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('phone');
            $table->string('affiliation');
            $table->string('title_resume');
            $table->text('content_resume');
            $table->enum('status',['pending','approved','rejected'])->default('pending');
            $table->enum('ispaid',['pending','paid'])->default('pending');
            $table->enum('isinvite',['nosent','sent'])->default('nosent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abstractdatas');
    }
};

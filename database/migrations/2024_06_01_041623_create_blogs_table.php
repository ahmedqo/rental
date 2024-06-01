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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_en')->unique();
            $table->string('title_fr')->unique();
            $table->string('title_it')->unique();
            $table->string('title_sp')->unique();
            $table->text('details_en')->nullable();
            $table->text('details_fr')->nullable();
            $table->text('details_it')->nullable();
            $table->text('details_sp')->nullable();
            $table->longText('content_en');
            $table->longText('content_fr');
            $table->longText('content_it');
            $table->longText('content_sp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('location');
            $table->dateTime('from');
            $table->dateTime('to');
            $table->integer('period');
            $table->float('total', 15, 5);
            $table->json('charges')->default(json_encode(['total' => 0, 'items' => []]));
            $table->string('status');
            $table->timestamps();

            $table->foreign('car')->references('id')->on('cars')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

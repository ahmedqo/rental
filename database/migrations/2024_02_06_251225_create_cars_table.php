<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category')->nullable();
            $table->unsignedBigInteger('brand')->nullable();
            $table->string('slug')->unique();
            $table->string('name_en')->unique();
            $table->string('name_fr')->unique();
            $table->string('name_it')->unique();
            $table->string('name_sp')->unique();
            $table->float('price', 15, 5);
            $table->integer('passengers');
            $table->integer('doors');
            $table->integer('cargo');
            $table->string('transmission');
            $table->string('fuel');
            $table->string('status');
            $table->boolean('promote');
            $table->text('details_en')->nullable();
            $table->text('details_fr')->nullable();
            $table->text('details_it')->nullable();
            $table->text('details_sp')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_fr')->nullable();
            $table->longText('description_it')->nullable();
            $table->longText('description_sp')->nullable();
            $table->timestamps();

            $table->foreign('brand')->references('id')->on('brands')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('category')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->float('price_january', 15, 5);
            $table->float('price_february', 15, 5);
            $table->float('price_march', 15, 5);
            $table->float('price_april', 15, 5);
            $table->float('price_may', 15, 5);
            $table->float('price_june', 15, 5);
            $table->float('price_july', 15, 5);
            $table->float('price_august', 15, 5);
            $table->float('price_september', 15, 5);
            $table->float('price_october', 15, 5);
            $table->float('price_november', 15, 5);
            $table->float('price_december', 15, 5);
        });

        DB::table('cars')->update([
            'price_january' => DB::raw('price'),
            'price_february' => DB::raw('price'),
            'price_march' => DB::raw('price'),
            'price_april' => DB::raw('price'),
            'price_may' => DB::raw('price'),
            'price_june' => DB::raw('price'),
            'price_july' => DB::raw('price'),
            'price_august' => DB::raw('price'),
            'price_september' => DB::raw('price'),
            'price_october' => DB::raw('price'),
            'price_november' => DB::raw('price'),
            'price_december' => DB::raw('price'),
        ]);

        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
};

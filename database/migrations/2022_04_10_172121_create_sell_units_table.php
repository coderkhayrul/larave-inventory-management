<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_units', function (Blueprint $table) {
            $table->bigIncrements('su_id');
            $table->integer('pu_id');
            $table->string('su_name')->unique();
            $table->text('su_remarks')->nullable();
            $table->string('su_slug', 50);
            $table->integer('su_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_units');
    }
}

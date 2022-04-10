<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_units', function (Blueprint $table) {
            $table->bigIncrements('pu_id');
            $table->string('pu_name')->unique();
            $table->text('pu_remarks')->nullable();
            $table->string('pu_slug', 50);
            $table->integer('pu_status')->default(1);
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
        Schema::dropIfExists('purchase_units');
    }
}

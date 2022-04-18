<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWareHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware_houses', function (Blueprint $table) {
            $table->bigIncrements('wh_id');
            $table->string('wh_name')->unique();
            $table->string('wh_phone')->unique();
            $table->string('wh_email')->nullable();
            $table->string('wh_address')->nullable();
            $table->integer('wh_create')->nullable();
            $table->integer('wh_editor')->nullable();
            $table->string('wh_slug')->unique();
            $table->string('wh_status')->default(1);
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
        Schema::dropIfExists('ware_houses');
    }
}

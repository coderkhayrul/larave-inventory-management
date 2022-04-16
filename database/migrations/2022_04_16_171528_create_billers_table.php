<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billers', function (Blueprint $table) {
            $table->bigIncrements('biller_id');
            $table->string('biller_name')->nullable();
            $table->string('biller_phone')->unique();
            $table->string('biller_email')->nullable();
            $table->string('biller_company')->nullable();
            $table->string('biller_city')->nullable();
            $table->string('biller_address')->nullable();
            $table->string('biller_country')->nullable();
            $table->integer('biller_creator');
            $table->integer('biller_editor')->nullable();
            $table->string('biller_slug')->unique();
            $table->integer('biller_status')->default(1);
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
        Schema::dropIfExists('billers');
    }
}

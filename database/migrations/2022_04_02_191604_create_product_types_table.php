<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->bigIncrements('pt_id');
            $table->string('pt_name')->unique();
            $table->text('pt_remarks')->nullable();
            $table->integer('pt_creator')->nullable();
            $table->integer('pt_editor')->nullable();
            $table->string('pt_slug')->unique();
            $table->integer('pt_status')->default(1);
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
        Schema::dropIfExists('product_types');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_categories', function (Blueprint $table) {
            $table->bigIncrements('expcate_id');
            $table->string('expcate_name')->unique();
            $table->string('expcate_code')->unique();
            $table->string('expcate_remarks');
            $table->integer('expcate_creator');
            $table->integer('expcate_editor');
            $table->string('expcate_slug')->unique();
            $table->string('expcate_status')->default(1);
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
        Schema::dropIfExists('expense_categories');
    }
}

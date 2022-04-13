<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->bigIncrements('cont_id');
            $table->string('cont_phone1', 25)->nullable();
            $table->string('cont_phone2', 25)->nullable();
            $table->string('cont_email1', 50)->nullable();
            $table->string('cont_email2', 50)->nullable();
            $table->text('cont_add1')->nullable();
            $table->text('cont_add2')->nullable();
            $table->integer('cont_status')->default(1);
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
        Schema::dropIfExists('contact_infos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('supplier_id');
            $table->string('supplier_name', 50);
            $table->string('supplier_phone', 20)->unique();
            $table->string('supplier_email', 40)->nullable();
            $table->string('supplier_company', 100)->nullable();
            $table->string('supplier_address', 200)->nullable();
            $table->string('supplier_city', 50)->nullable();
            $table->string('supplier_state', 50)->nullable();
            $table->string('supplier_postal', 10)->nullable();
            $table->string('supplier_country', 50)->nullable();
            $table->text('supplier_remarks')->nullable();
            $table->integer('supplier_creator')->nullable();
            $table->integer('supplier_editor')->nullable();
            $table->string('supplier_slug')->unique();
            $table->integer('supplier_status')->default(1);
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
        Schema::dropIfExists('suppliers');
    }
}

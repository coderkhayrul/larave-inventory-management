<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_settings', function (Blueprint $table) {
            $table->bigIncrements('sm_id');
            $table->string('sm_facebook')->nullable();
            $table->string('sm_twitter')->nullable();
            $table->string('sm_linkedin')->nullable();
            $table->string('sm_dribbble')->nullable();
            $table->string('sm_youtube')->nullable();
            $table->string('sm_slack')->nullable();
            $table->string('sm_instagram')->nullable();
            $table->string('sm_behance')->nullable();
            $table->string('sm_google')->nullable();
            $table->string('sm_raddit')->nullable();
            $table->integer('sm_status')->default(1);
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
        Schema::dropIfExists('social_settings');
    }
}

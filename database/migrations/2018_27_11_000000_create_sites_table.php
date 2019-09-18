<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
            $table->string('site_url')->nullable();
            $table->text('site_description')->nullable();
            $table->enum('client_status', ['ACTIVE', 'NOT ACTIVE'])->default('ACTIVE');
            $table->timestamps();

            //$table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sites');
    }
}

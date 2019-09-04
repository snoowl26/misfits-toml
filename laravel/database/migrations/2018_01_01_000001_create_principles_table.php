<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrinciplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('principles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('organization_id');

            // https://github.com/stellar/stellar-protocol/blob/master/ecosystem/sep-0001.md#issuer-documentation
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('keybase')->nullable();
            $table->string('telegram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();
            $table->string('id_photo_hash')->nullable();
            $table->string('verification_photo_hash')->nullable();
            $table->timestamps();

            $table->foreign('organization_id')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('principles');
    }
}

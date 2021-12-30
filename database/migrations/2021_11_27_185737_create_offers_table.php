<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bid_id');
            $table->foreign('bid_id')->references('id')->on('bids');
            $table->unsignedBigInteger('collectioncenter_id');
            $table->foreign('collectioncenter_id')->references('id')->on('users');
            $table->integer('quantity');
            $table->string('offer_description');
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
        Schema::dropIfExists('offers');
    }
}

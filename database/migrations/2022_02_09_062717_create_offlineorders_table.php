<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfflineordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offlineorders', function (Blueprint $table) {
            $table->id();
            $table->string("product_id");
            $table->integer("quantity");
            $table->integer("price");
            $table->integer("total_price");
            $table->string("customer_name");
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
        Schema::dropIfExists('offlineorders');
    }
}

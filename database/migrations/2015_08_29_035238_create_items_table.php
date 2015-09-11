<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
	
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->string('name');
            $table->string('image_url');
            $table->string('description');
            $table->decimal('price', 16, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('items');
    }
}

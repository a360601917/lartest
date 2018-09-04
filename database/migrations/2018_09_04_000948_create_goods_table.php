<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku')->nullable(true);
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('category_child_id');
            $table->string('title')->index();
            $table->string('etitle')->nullable(true)->index();
            $table->string('image')->nullable(true);
            $table->decimal('price',10,2);
            $table->text('describe')->nullable(true);
            $table->unsignedInteger('sort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}

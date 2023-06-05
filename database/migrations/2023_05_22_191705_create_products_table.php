<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('gambar');
            $table->integer('business_unit_id');
            $table->string('item_number');
            $table->string('sku_dch');
            $table->text('item_name');
            $table->integer('uom');
            $table->decimal('cbm', 18, 9, true);
            $table->decimal('kgs', 18, 9, true);
            $table->double('price');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}

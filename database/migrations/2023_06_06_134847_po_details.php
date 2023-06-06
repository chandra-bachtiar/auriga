<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PoDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_details', function (Blueprint $table) {
            $table->bigIncrements('id_detail');
            $table->integer('id_po');
            $table->string('number_item');
            $table->string('sku_dch');
            $table->text('item_name');
            $table->integer('uom');
            $table->double('price_exclude');
            $table->double('price_include');
            $table->integer('qty');
            $table->tinyInteger('disc');
            $table->double('value');
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
        //
    }
}

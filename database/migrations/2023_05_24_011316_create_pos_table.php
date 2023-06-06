<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos', function (Blueprint $table) {
            $table->bigIncrements('id_po');
            $table->integer('id_bu');
            $table->text('customer_name');
            $table->text('address');
            $table->string('phone');
            $table->string('sales');
            $table->char('approval')->nullable();
            $table->date('date');
            $table->json('order_type')->nullable();
            $table->json('remarks')->nullable();
            $table->double('grand_total')->nullable();
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
        Schema::dropIfExists('pos');
    }
}
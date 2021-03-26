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
            $table->id();
            $table->bigInteger('parent_id')->nullable();
            $table->string('sku');
            $table->text('description');
            $table->smallInteger('cpt');
            $table->smallInteger('jhb');
            $table->smallInteger('dbn');
            $table->mediumInteger('totalStock');
            $table->mediumInteger('dealerPrice');
            $table->mediumInteger('retailPrice');
            $table->string('manufacturer');
            $table->string('imageUrl');
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

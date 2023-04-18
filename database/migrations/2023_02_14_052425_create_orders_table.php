<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('adress');
            $table->string('description');
            $table->integer('max_price');
            $table->integer('price')->nullable();
            $table->string('photo_before');
            $table->string('photo_after')->nullable();

            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->enum('status', ['Новая','Ремонтируется','Отремонтировано'])->default('Новая');

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
        Schema::dropIfExists('orders');
    }
}

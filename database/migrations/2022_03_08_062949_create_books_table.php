<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('kode')->unique();
            $table->string('title');
            $table->integer('qty');
            $table->integer('price');
            $table->string('cover')->nullable();
            $table->unsignedTinyInteger('category_id');
            $table->boolean('published')->default(true);
            $table->timestamps();

            // relation with category
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};

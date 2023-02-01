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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamp('date')->nullable();
            $table->integer('price');
            $table->string('cover')->nullable();
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->foreign('categorie_id')
                ->references('id')
                ->on('categories');
            $table->unsignedBigInteger('artiste_id')->nullable();
            $table->foreign('artiste_id')
                ->references('id')
                ->on('artistes');
            $table->unsignedBigInteger('taille_id')->nullable();
            $table->foreign('taille_id')
                ->references('id')
                ->on('tailles');
            $table->unsignedBigInteger('collection_id')->nullable();
            $table->foreign('collection_id')
                ->references('id')
                ->on('collections');
            $table->timestamps();
            $table->softDeletes();
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
};

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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamp('date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('artistes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamp('date')->nullable();
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->foreign('categorie_id')
                ->references('id')
                ->on('categories');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamp('date')->nullable();
            $table->integer('price');
            $table->integer('size');
            $table->string('cover')->nullable();
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->foreign('categorie_id')
                ->references('id')
                ->on('categories');
            $table->unsignedBigInteger('artiste_id')->nullable();
            $table->foreign('artiste_id')
                ->references('id')
                ->on('artistes');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('paniers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('panier_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('panier_id')->nullable();
            $table->foreign('panier_id')
                ->references('id')
                ->on('paniers');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
            $table->integer('quantite');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamp('date')->nullable();
            $table->string('ville')->nullable();
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->foreign('categorie_id')
                ->references('id')
                ->on('categories');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->foreign('categorie_id')
                ->references('id')
                ->on('categories');
            $table->string('title');
            $table->string('content');
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
        Schema::dropIfExists('users');
    }
};

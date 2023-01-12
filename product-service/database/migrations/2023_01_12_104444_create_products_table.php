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
            $table->id();
            $table->foreignIdFor(Game::class)->nullable();
            $table->foreignIdFor(Category::class)->nullable();
            $table->string('name');
            $table->string('thumbnail')->nullable();
            $table->string('logo')->nullable();
            $table->string('slug');
            $table->string('desc')->nullable();
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('price_ori');
            $table->string('url_ref')->nullable();
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
};

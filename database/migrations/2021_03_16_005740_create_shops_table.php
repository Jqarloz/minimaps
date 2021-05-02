<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->integer('status')->default(1);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();

            $table->string('home_service',2)->nullable();
            $table->string('hs_isfree',2)->nullable();
            $table->double('hs_mincost',8,2)->nullable();
            $table->double('hs_maxcost',8,2)->nullable();
            $table->string('website')->nullable();
            $table->string('hour_always',2)->nullable();
            $table->string('hour_open')->nullable();
            $table->string('hour_close')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            
            $table->foreign('category_id')->references('id')->on('categories')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
            
            $table->foreign('location_id')->references('id')->on('locations')
                    ->onDelete('set null')
                    ->onUpdate('cascade');

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
        Schema::dropIfExists('shops');
    }
}

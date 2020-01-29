<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacancyPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cat_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->foreign('cat_id')->references('id')->on('vacancy_categories');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('vacancy_posts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->json('titles')->default('[]');
            $table->json('achievements')->default('[]');
            $table->text('body')->nullable();
            $table->string('name_en')->nullable();
            $table->json('titles_en')->default('[]');
            $table->json('achievements_en')->default('[]');
            $table->text('body_en')->nullable();
            $table->boolean('visible')->default(false)->index();
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
        Schema::dropIfExists('designers');
    }
}

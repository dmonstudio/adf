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
            $table->string('slug')->index();
            $table->json('titles')->default('{}');
            $table->json('achievements')->default('{}');
            $table->text('body')->default('');
            $table->string('en_name')->default('');
            $table->json('en_titles')->default('{}');
            $table->json('en_achievements')->default('{}');
            $table->text('en_body')->default('');
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

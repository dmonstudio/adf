<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowcasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showcases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_en');
            $table->string('slug')->unique();
            $table->text('body');
            $table->text('body_en');
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
        Schema::dropIfExists('showcases');
    }
}

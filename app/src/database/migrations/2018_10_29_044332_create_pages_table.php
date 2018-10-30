<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Page;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->unsignedSmallInteger('id')->primary();
            $table->string('type')->index();
            $table->json('settings')->default('{}');
            $table->timestamps();
        });

        foreach(['home', 'about', 'career', 'contact'] as $i => $type) {
            $page = new Page;
            $page->id = $i + 1;
            $page->type = $type;
            $page->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}

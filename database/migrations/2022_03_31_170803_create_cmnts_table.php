<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmnts', function (Blueprint $table) {        // automatically created cmnts i,e plural of cmnt
            $table->bigIncrements('id');
            $table->text('cmnt');
            $table->unsignedInteger('user_id');      // unsigned interger means value cannot be negative
            $table->unsignedInteger('blog_id');
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
        Schema::dropIfExists('cmnts');
    }
}

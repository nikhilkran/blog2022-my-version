<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id'); // Important note:- here we can take in uppercase to avoid confusion (jquery id concept) 
            $table->string('name')->unique();
            $table->unsignedInteger('category_id');
            $table->text('content');
            $table->timestamps();   // created_at and updated_at comes under it
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}

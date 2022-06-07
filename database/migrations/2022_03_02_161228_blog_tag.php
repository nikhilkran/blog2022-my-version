<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlogTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_tag',function(Blueprint $table){
            $table->bigIncrements('id');                       //mistake bigIncrements
            $table->unsignedInteger('blog_id');
            $table->unsignedInteger('tag_id');
            $table->timestamps();


        });
        
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_tag');
        //
    }
}

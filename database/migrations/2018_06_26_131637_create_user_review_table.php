<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReviewTable extends Migration
{
    
     
     
    public function up()
    {
        Schema::create('user_review', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('user_id')->unsigned()->index();
            $table->integer('review_id')->unsigned()->index();
            $table->timestamps();
            
             $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('review_id')->references('id')->on('reviews');
            
            $table->unique(['user_id', 'review_id']);
        });
    }

    

     
    public function down()
    {
        Schema::dropIfExists('user_review');
    }
}
?>
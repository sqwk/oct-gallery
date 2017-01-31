<?php namespace PolloZen\SimpleGallery\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateGalleriesPostTable extends Migration
{
    public function up()
    {
        Schema::create('pollozen_simplegallery_galleries_posts', function($table){
            $table->engine = 'InnoDB';
            $table->integer('gallery_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->primary(['gallery_id','post_id'],'pollozen_gallery_post');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pollozen_simplegallery_galleries_posts');
    }
}

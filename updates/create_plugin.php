<?php namespace Sqwk\Gallery\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Sqwk\Gallery\Models\Gallery;

class CreatePlugin extends Migration
{
    public function up()
    {
        if (Schema::hasTable('pollozen_simplegallery_galleries') === false) {
            Schema::create('sqwk_gallery_galleries', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('name');
                $table->string('description')->nullable();
                $table->string('slug')->nullable();
                $table->timestamps();
            });
        } else {
            Schema::rename('pollozen_simplegallery_galleries', 'sqwk_gallery_galleries');
        }

        if (Schema::hasTable('pollozen_simplegallery_galleries_posts') === false) {
            Schema::create('sqwk_gallery_galleries_posts', function ($table) {
                $table->engine = 'InnoDB';
                $table->integer('gallery_id')->unsigned();
                $table->integer('post_id')->unsigned();
                $table->primary(['gallery_id','post_id'], 'pollozen_gallery_post');
                $table->timestamps();
            });
        } else {
            Schema::rename('pollozen_simplegallery_galleries_posts', 'sqwk_gallery_galleries_posts');
        }
    }

    public function down()
    {
        Schema::dropIfExists('sqwk_gallery_galleries_posts');
        Schema::dropIfExists('sqwk_gallery_galleries');
    }
}

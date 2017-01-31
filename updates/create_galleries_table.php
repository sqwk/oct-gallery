<?php namespace PolloZen\SimpleGallery\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('pollozen_simplegallery_galleries', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('pollozen_simplegallery_galleries');
    }
}

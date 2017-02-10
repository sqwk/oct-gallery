<?php namespace PolloZen\SimpleGallery\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use PolloZen\SimpleGallery\Models\Gallery;

class UpdateGalleriesSlug extends Migration
{
    public function up()
    {
        if(Schema::hasColumn('pollozen_simplegallery_galleries','slug')){
            return;
        }
        Schema::table('pollozen_simplegallery_galleries', function($table){
            $table->string('slug')->nullable();
        });
        $galleries = Gallery::all();
        foreach($galleries as $gallery) {
            $gallery->slug =  str_slug($gallery->name, "-");
            $gallery->save();
        }
    }
    public function down()
    {
        //
    }
}

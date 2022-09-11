<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag', function (Blueprint $table) {
            $table->id();
            $table->integer('photo_id')->unsigned();
            $table->string('name', 128);
            $table->timestamps();

            // $table->foreign('photo_id')->references('id')->on('photo');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('tag', function ($t) {
            $t->dropForeign('tag_photo_id_foreign');
        });
        */    

        Schema::dropIfExists('tag');
    }
};

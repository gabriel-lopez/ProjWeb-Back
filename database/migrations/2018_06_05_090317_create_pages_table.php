<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string("nom")->unique();
            $table->text("contenu");
            $table->integer("employe_id");

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employe_id')->references('id')->on('employes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}

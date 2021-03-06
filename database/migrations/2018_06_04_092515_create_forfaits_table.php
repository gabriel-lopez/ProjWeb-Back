<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForfaitsTable extends Migration
{
    public function up()
    {
        Schema::create('forfaits', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('nom','255');
            $table->text('description');
            $table->double('prix');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forfaits');
    }
}

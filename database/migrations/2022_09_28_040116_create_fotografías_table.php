<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotografíasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotografías', function (Blueprint $table) {
            $table->id();
            $table->string('dimension');
            $table->boolean('tipo');//true=privado, false=publico;
            $table->string('url');
            $table->boolena('publicado');//si la foto se publica o estará en borrador
            $table->foreignId('fotografo_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotografías');
    }
}

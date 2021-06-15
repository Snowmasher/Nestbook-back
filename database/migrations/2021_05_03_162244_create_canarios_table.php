<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canarios', function (Blueprint $table) {
            $table->id();
            $table->string('num_anilla')->unique();
            $table->string('num_anilla_padre')->nullable();
            $table->string('num_anilla_madre')->nullable();
            $table->string('url_img')->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->char('sexo')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('canarios');
    }
}

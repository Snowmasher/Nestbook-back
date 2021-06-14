<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_from');
            $table->unsignedBigInteger('id_to');
            $table->char('tipo');
            $table->text('contenido');
            $table->boolean('aceptada');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_from')->references('id')->on('users');
            $table->foreign('id_to')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificacions');
    }
}

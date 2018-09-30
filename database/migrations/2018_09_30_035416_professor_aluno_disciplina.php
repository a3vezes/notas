<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfessorAlunoDisciplina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_professor')->unsigned();            
            $table->integer('id_aluno')->unsigned();            
            $table->integer('id_disciplina')->unsigned();            
            $table->integer('faltas');
            $table->integer('nota1');
            $table->integer('nota2');
            $table->integer('nota3');
            $table->string('aprovado');            
        });

        Schema::table('pad', function($table) {
            $table->foreign('id_professor')->references('id')->on('users');
            $table->foreign('id_aluno')->references('id')->on('users');
            $table->foreign('id_disciplina')->references('id')->on('disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pad');
    }
}

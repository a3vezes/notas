<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UserController@home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('professor')->middleware('auth')->group(function () {
   Route::get('/', 'UserController@professorIndex')->name('profIndex');
   Route::get('/abrirturma', 'UserController@professorAbrirTurma')->name('abrirTurma');
   Route::post('/abrirturmaR', 'UserController@professorAbrirTurmaR')->name('abrirTurmaR');
   Route::get('/cadastrarTurma', 'UserController@professorCadastrarDisciplina')->name('cadDisciplina');
   Route::post('/cadastrarTurmaR', 'UserController@professorCadastrarDisciplinaR')->name('cadDisciplinaR');
});


Route::prefix('aluno')->middleware('auth')->group(function () {
    
    Route::get('/', 'UserController@alunoIndex')->name('aluIndex');
    Route::get('/notasefaltas', 'UserController@alunoNotasFaltas')->name('verNotas');
 });
 

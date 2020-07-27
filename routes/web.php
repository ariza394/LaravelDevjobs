<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacanteController;


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


Auth::routes(['verify' => true]);

//rutas protegidas
//Route::group(['middleware' => ['auth','verified']],function(){
    Route::group(['middleware' => ['auth']],function(){
    
    //vacants route
    Route::get('/vacantes','VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create','VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes/',"VacanteController@store")->name('vacantes.store');
    Route::delete('/vacantes/{vacante}',"VacanteController@destroy")->name('vacante.destroy');
    Route::get('/vacantes/{vacante}/edit',"VacanteController@edit")->name('vacante.edit');
    Route::put('/vacantes/{vacante}',"VacanteController@update")->name('vacante.update');

    //Subir e iliminar imagenes
    Route::post('/vacantes/imagen','VacanteController@imagen')->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen','VacanteController@borrarimagen')->name('vacantes.borrar');

    //cambiar estado de vacante
    Route::post('/vacantes/{vacante}','VacanteController@estado')->name('vacantes.estado');

    //notificaciones
    Route::get('/notificaciones','NotificacionesController')->name('notificaciones');

});

//pagina de inicio
Route::get('/','InicioController')->name('inicio');

//listar por categorias
Route::get('/categorias/{categoria}','CategoriaController@show')->name('categoria.show');

//datos para una vacante
Route::post('/candidatos/store','CandidatoController@store')->name('candidato.store');
Route::get('/candidatos/{id}','CandidatoController@index')->name('candidato.index');

//buscador de vacantes en la principal//--------------tiene que estar arriba----
Route::post('/busqueda/buscar','VacanteController@buscar')->name('vacantes.buscar');
Route::get('/busqueda/buscar','VacanteController@resultados')->name('vacantes.resultados');
//vacants route sin autenticacion
Route::get('/vacantes/{vacante}',"VacanteController@show")->name('vacantes.show');



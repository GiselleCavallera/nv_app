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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




//Nuevo Hospedaje
Route::get('/nuevohospedaje', 'HomeController@getNuevoHospedaje')->name('nuevohospedaje');
Route::post('/nuevohospedaje', 'HomeController@saveNuevoHospedaje')->name('nuevohospedaje');

//Route::get('/informacionhospedaje', 'HomeController@getInformacionHospedaje')->name('informacionhospedaje'); //gc 15/07
Route::get('/informacionhospedaje', 'HospedajeController@getInformacionHospedaje')->name('informacionhospedaje'); //CAMBIO 

Route::get('/inscripciones', 'HomeController@getInscripciones')->name('inscripciones');
Route::post('/inscripciones', 'HomeController@saveInscripciones')->name('inscripciones');

Route::get('/archivostalleres/{idTaller}', 'HomeController@getArchivosTalleres')->name('archivostalleres'); ///{idTaller}

Route::get('/nuevotaller', 'HomeController@getNuevoTaller')->name('nuevotaller');
Route::post('/nuevotaller', 'HomeController@saveNuevoTaller')->name('nuevotaller');
Route::get('/asignarhospedaje', 'HomeController@getAsignarHospedaje')->name('asignarhospedaje');
Route::get('/nuevoorador', 'HomeController@getNuevoOrador')->name('nuevoorador');
Route::post('/nuevoorador', 'HomeController@saveNuevoOrador')->name('nuevoorador');
Route::get('/consultarinscripciones', 'HomeController@consultarInscripciones')->name('consultarinscripciones');
Route::post('/aa', 'HomeController@aa')->name('aa');
Route::post('/desinscribir', 'HomeController@desinscribir')->name('desinscribir');
//Route::get('/nuevareflexion', 'HomeController@getNuevaReflexion')->name('nuevareflexion'); gc 17/07
//Route::post('/nuevareflexion', 'HomeController@saveNuevaReflexion')->name('nuevareflexion');  gc 17/07
//Route::get('/reflexiones', 'HomeController@reflexiones')->name('reflexiones');
Route::get('/subirarchivostaller', 'HomeController@getSubirArchivosTaller')->name('subirarchivostaller');
Route::post('/subirarchivostaller', 'HomeController@saveSubirArchivosTaller')->name('subirarchivostaller');
Route::get('/subirarchivos', 'HomeController@getSubirArchivos')->name('subirarchivos');
Route::post('/subirarchivos', 'HomeController@saveSubirArchivos')->name('subirarchivos');
Route::get('/archivostalleres/{idTaller}', 'HomeController@getArchivosTalleres')->name('archivostalleres'); //ver acaaa 15/07/17
Route::get('/archivos', 'HomeController@getArchivos')->name('archivos');
Route::get('/talleres', 'HomeController@getTalleres')->name('talleres');
Route::get('/pr', 'HomeController@getPr')->name('pr');
//REFLEXIONES
Route::resource('/reflexiones', 'ReflexionController', ['except' => ['show']]);

Route::get('listadoreflexiones', 'ReflexionController@listadoReflexiones')->name('listadoreflexiones');

Route::get('/nuevareflexion', 'ReflexionController@getNuevaReflexion')->name('nuevareflexion');
Route::post('/nuevareflexion', 'ReflexionController@saveReflexion')->name('savereflexion');
Route::post('/deletereflexion/{idReflexion}', 'ReflexionController@destroy')->name('deletereflexion');
Route::post('/updatereflexion/{idReflexion}', 'ReflexionController@update')->name('updatereflexion');

Route::get('reflexionesinscriptos', 'ReflexionController@reflexionesInscriptos')->name('reflexionesinscriptos');


//PREGUNTAS
Route::resource('/preguntas', 'PreguntaController', ['except' => ['show']]);
Route::post('/savepregunta/{idTaller}/{idDictado}', 'PreguntaController@savePregunta')->name('savepregunta');
Route::get('/preguntaslistado/{idDictado}', 'PreguntaController@listadoPreguntas')->name('preguntaslistado');
Route::get('/inscriptostaller/{idDictado}', 'InscriptosController@inscriptosAlTaller')->name('inscriptosaltaller'); //02/08/2017
Route::get('/inscriptostallersimple/{idDictado}', 'InscriptosController@inscriptosAlTallerSimple')->name('inscriptosaltallersimple'); //18/8/17

Route::get('/dictadoslistado/', 'HomeController@dictadosListado')->name('dictadoslistado');

//archivos generales
Route::get('archivosgenerales', 'HomeController@getArchivosGenerales')->name('archivosgenerales');

//ORADORES
Route::get('/oradoreslistado', 'HomeController@getOradores')->name('oradoreslistado');

//NOTA
Route::post('/savenota/{idTaller}/{idDictado}', 'NotaController@saveNota')->name('savenota');

//Prueba UI
Route::get('/ui', function(){
   
    return view('pruebaUI');
});

//REDES SOCIALES
Route::get('/redessociales', 'HomeController@getRedes')->name('redessociales');


Route::get('/check', function(){
   
    return view('pruebaCheck');
});


Route::get('/sorteo', 'InscriptosController@sorteo')->name('sorteo');

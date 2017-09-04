<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
| 
 */
//---Raiz----//
Route::resource('/', 'HomeController');

Route::get('inicio', 'IncidenciasController@index');

//---Login - restore----//

// Autenticación
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' => 'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);
 
// Recuperar contraseña via mail
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Validations remotas
Route::get('/path/to/remote/validator/{id}', 'UsuariosController@valid');
Route::get('/path/to/remote/email/{id}', 'UsuariosController@unique');

//---INCIDENCIAS----//
Route::resource('incidencias', 'IncidenciasController');
Route::get('incidencias/seguimiento/{id}', 'IncidenciasController@seguimiento')->name('incidencias/seguimiento');
Route::get('incidencias/registros/{id}', 'IncidenciasController@show')->name('incidencias/registros');
Route::get('incidencias/paginador/{id}', 'IncidenciasController@paginador')->name('incidencias/paginador');
Route::get('incidencias/buscador/{criterio}/{parametro}', 'IncidenciasController@scope')->name('incidencias/buscador');
Route::post('incidencias/acuerdo', 'CategoriasController@acuerdo')->name('incidencias/acuerdo');

Route::post('incidencias_seguimientos', 'IncidenciasController@nuevo_seguimiento')->name('incidencias_seguimientos');
Route::post('incidencias_solucion', 'IncidenciasController@nueva_solucion')->name('incidencias_solucion');
Route::post('incidencias_documentos', 'IncidenciasController@nuevo_documento')->name('incidencias_documentos');

//---REPORTES----//
Route::resource('reportes', 'ReportesController');

//---ADMINISTRACIÓN----//
Route::get('municipios/{id}', 'EntidadesController@municipios')->name('grupo');

// Grupos
Route::resource('administracion_grupos', 'GruposController');
Route::get('grupo/{id}', 'GruposController@destroy')->name('grupo');

// Entidades
Route::resource('administracion_entidades', 'EntidadesController');
Route::get('entidad/{id}', 'EntidadesController@destroy')->name('entidad');
Route::get('entidad_cambiar', 'EntidadesController@change')->name('entidad_cambiar');
Route::post('entidad_change', 'EntidadesController@entities_change')->name('entidad_change');

// Reglas
Route::resource('administracion_reglas', 'ReglasController');

// Usuarios
Route::resource('administracion_usuarios', 'UsuariosController');
Route::get('usuario/{id}', 'UsuariosController@destroy')->name('usuario');
Route::get('usuarioactive/{id}', 'UsuariosController@active')->name('usuarioactive');
Route::get('change', 'UsuariosController@cambiar')->name('change');
Route::post('cambiar', 'UsuariosController@change')->name('cambiar');
Route::post('usuario/perfil', 'UsuariosController@image')->name('usuario/perfil');

Route::get('validator/{pass}', 'UsuariosController@valid');

// funcionalidades
Route::resource('configuracion_funcionalidades', 'FuncionalidadesController');
Route::get('funcionalidad/{id}/{name}', 'FuncionalidadesController@destroy')->name('funcionalidad');

// Perfiles
Route::resource('administracion_perfiles', 'PerfilesController');
Route::get('perfil/{id}/{name}', 'PerfilesController@destroy')->name('perfil');

// Categorias
Route::resource('administracion_categorias', 'CategoriasController');
Route::get('categoria/{id}/{name}', 'PerfilesController@destroy')->name('categoria');

// Categorias
Route::resource('administracion_titulos', 'TitulosController');
Route::get('titulo/{id}/{name}', 'TitulosController@destroy')->name('titulo');

//---CONFIGURACION----//

// Mantenimiento
Route::resource('configuracion_mantenimiento', 'MantenimientosController');
Route::get('mantenimiento/{id}', 'MantenimientosController@destroy')->name('mantenimiento');

// Logs
Route::resource('configuracion_logs', 'LogsController');
Route::get('logs/registros/{id}', 'LogsController@show')->name('logs/registros');
Route::get('logs/paginador/{id}', 'LogsController@paginador')->name('logs/paginador');


// General
Route::resource('configuracion_general', 'GeneralController');

// Acuerdos de nivel
Route::resource('configuracion_acuerdos_de_nivel', 'AcuerdosnivelController');

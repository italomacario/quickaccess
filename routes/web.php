<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/cursos/{id?}', 'CourseController@courses')->name('courses');
Route::get('/curso/{id}', 'CourseController@courseOne')->name('courseOne');
Route::post('/cursos', 'CourseController@searchCourses')->name('courses.search');


Route::middleware('auth')->group(function () {

    Route::get('/perfil', 'UserController@profile')->name('profile');
    Route::post('/perfil/alterar', 'UserController@profilealter')->name('alter.profile');
    Route::get('/meus-cursos', 'CourseController@myCourses')->name('my-courses');

    Route::middleware('checksubscriber')->group(function(){
        Route::get('/lesson/{course_id}/{id_lesson}', 'LessonController@lessonview')->name('lesson.view');
    });






    Route::middleware('checkinstructor')->group(function () {
        
        Route::group(['prefix' => 'painel'], function(){
            Route::get('', 'AdminController@index')->name('dashboard');
            // COURSES
            Route::get('curso', 'CourseController@course')->name('course'); // TELAA DE CADASTRO
            Route::post('course', 'CourseController@courseRegister')->name('course.register'); // CADASTRAR CURSO BACKEND
            Route::get('curso/listar', 'CourseController@courseList')->name('course.list'); // TELA DE LISTA DE CURSOS
            Route::get('curso/alterar/{id}', 'CourseController@courseAlter')->name('course.alter'); // TELA DE ALTERAR CURSO
            Route::post('curso/alterar/{id}', 'CourseController@courseAlterDo')->name('course.alter.do'); // ALTERAR CURSO BACKEND
            Route::delete('curso/deletar/{id}', 'CourseController@courseDelete')->name('course.delete'); // DELETAR CURSO BACKEND
            // MODULES
            Route::get('curso/modulo/cadastrar/{id}', 'ModuleController@module')->name('module'); // TELA DE CADASTRAR MODULO
            Route::post('curso/modulo/register/{id}', 'ModuleController@moduleRegister')->name('module.register'); // CADASTRAR MODULO BACKEND
            Route::get('curso/modulo/listar/{id?}', 'ModuleController@moduleList')->name('module.list'); // TELA DE LISTA DE MODULOS DO CURSO
            Route::get('curso/modulo/alterar/{id}', 'ModuleController@moduleAlter')->name('module.alter'); // TELA DE ALTERAR MODULO DO CURSO
            Route::post('curso/modulo/alterar/{id}', 'ModuleController@moduleAlterDo')->name('module.alter.do'); // ALTERAR MODULO BACKEND
            Route::delete('curso/modulo/deletar/{idmodule}/{idcourse}', 'ModuleController@moduleDelete')->name('module.delete'); // DELETAR MODULO BACKEND
            // LESSONS
            Route::get('curso/modulo/aula/cadastrar/{id}', 'LessonController@lesson')->name('lesson'); // TELA DE CADASTRO DE AULAS
            Route::post('curso/modulo/aula/cadastrar/{id}', 'LessonController@lessonRegister')->name('lesson.register'); // CADASTRAR AULA BACKEND
            Route::get('curso/modulo/aula/listar/{id?}', 'LessonController@lessonList')->name('lesson.list'); // LISTAR AULAS DO MODULO
            Route::get('curso/modulo/aula/alterar/{id}', 'LessonController@lessonAlter')->name('lesson.alter'); // TELA DE ALTERAR LESSON DO CURSO
            Route::post('curso/modulo/aula/alterar/{id}', 'LessonController@lessonAlterDo')->name('lesson.alter.do'); // ALTERAR MODULO BACKEND
            Route::delete('curso/modulo/aula/deletar/{idlesson}/{idmodule}', 'LessonController@lessonDelete')->name('lesson.delete'); // DELETAR AULA BACKEND
            
            // USERS
            
            Route::get('usuario/listar', 'UserController@userList')->name('user.list'); // LISTAR USUARIOS CADASTRADOS
            Route::post('user/alter/{id}', 'UserController@AlterarUsuario')->name('user.alter'); // ALTERAR USUARIO
        });
    });
});
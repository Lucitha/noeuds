<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NodesController;
use App\Http\Controllers\RessourcesController;
use App\Http\Controllers\UserController;
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

Route::get('/login', function () {
    return view('welcome');
});
Route::get('/layout', function () {
    return view('layout');
});
Route::get('/', function () {
    return view('noeuds');
});


Route::get('/register', function () {
    return view('register');
});


Route::post('/addNode', [NodesController::class,'newNode']);
Route::post('/updateNode/{id}', [NodesController::class,'updateNode']);
Route::get('/nodes', [NodesController::class,'showNode']);
Route::get('/deleteNode/{id}', [NodesController::class,'deleteNode']);
Route::get('/editNode/{id}', [NodesController::class,'editNode']);
Route::get('/node_user', [NodesController::class,'userShow']);

Route::post('/connexion', [UserController::class,'connexion']);
Route::post('/addUser', [UserController::class,'addUser']);


Route::post('/addRessources', [RessourcesController::class,'newRessource']);
Route::get('/ressources', [RessourcesController::class,'showRessources']);
Route::get('/ressources/{id}', [RessourcesController::class,'editRessources']);
Route::post('/updateRessources/{id}', [RessourcesController::class,'updateRessources']);
Route::get('/deleteRessource/{id}', [RessourcesController::class,'deleteRessource']);


Route::get('/showComments/{id}', [CommentController::class,'showComment']);
Route::get('/deleteComment/{id}', [CommentController::class,'deleteComment']);
Route::get('/updateComment/{id}', [CommentController::class,'updateComment']);
Route::post('/saveComment/{id}', [CommentController::class,'newComment']);



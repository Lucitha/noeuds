<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NodesController;
use App\Http\Controllers\RessourcesController;
use App\Http\Controllers\UtilisateursController;
use App\Http\Middleware\Connect;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});
Route::post('/connexion', [UtilisateursController::class,'connexion']);
Route::post('/addUser', [UtilisateursController::class,'addUser']);

Route::middleware([Connect::class])->group(function(){

    Route::get('/add', function () {
        return view('noeuds');
    });
    Route::post('/addNode', [NodesController::class,'newNode']);
    Route::post('/updateNode/{id}', [NodesController::class,'updateNode']);
    Route::get('/nodes', [NodesController::class,'showNode']);
    Route::get('/deleteNode/{id}', [NodesController::class,'deleteNode']);
    Route::get('/editNode/{id}', [NodesController::class,'editNode']);

    Route::get('/ressources', [RessourcesController::class,'showRessources']);
    Route::get('/ressources/{id}', [RessourcesController::class,'editRessources']);
    Route::get('/deleteRessource/{id}', [RessourcesController::class,'deleteRessource']);
    Route::post('/addRessources', [RessourcesController::class,'newRessource']);
    Route::post('/updateRessources/{id}', [RessourcesController::class,'updateRessources']);

    Route::get('/showComments/{id}', [CommentController::class,'showComment']);
    Route::get('/deleteComment/{id}', [CommentController::class,'deleteComment']);
    Route::get('/updateComment/{id}', [CommentController::class,'updateComment']);
    Route::get('/editComment/{id}', [CommentController::class,'editComment']);
    Route::post('/saveComment/{id}', [CommentController::class,'newComment']);

});

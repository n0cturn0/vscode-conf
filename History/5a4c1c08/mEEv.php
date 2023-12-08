<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StorageLinkController;

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
//Site Capa
Route::get('/', [\App\Http\Controllers\SiteController::class,'index'])->name('index');
Route::get('/index', [\App\Http\Controllers\SiteController::class,'index'])->name('index');
Route::get('/colaborador', [\App\Http\Controllers\SiteController::class,'colaborador'])->name('colaborador');
Route::get('/vaga/{id}', [\App\Http\Controllers\SiteController::class,'vaga'])->name('vaga');
Route::get('/modal/{id}', [\App\Http\Controllers\SiteController::class,'modal'])->name('modal');
//Categorias
Route::post('/createcategoria', [App\Http\Controllers\HomeController::class, 'createcategoria'])->name('createcategoria');
Route::get('/destroy/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');
//Produtos
Route::get('/objprodutos', [App\Http\Controllers\HomeController::class, 'produtos'])->name('produtos');
Route::post('/criaproduto', [App\Http\Controllers\HomeController::class, 'criaproduto'])->name('criaproduto');
Route::post('/criavaga', [App\Http\Controllers\HomeController::class, 'criavaga'])->name('criavaga');
Route::get('/produtoimage/{id}', [App\Http\Controllers\HomeController::class, 'produtoimage'])->name('produtoimage');
Route::post('/uploadimage/', [App\Http\Controllers\HomeController::class, 'uploadimage'])->name('uploadimage');
Route::get('/showproduto/{id}', [App\Http\Controllers\HomeController::class, 'showproduto'])->name('showproduto');
Route::get('/apagarproduto/{id}', [App\Http\Controllers\HomeController::class, 'apagarproduto'])->name('apagarproduto');
Route::get('/apagarprodutoimagem/{id}', [App\Http\Controllers\HomeController::class, 'apagarprodutoimagem'])->name('apagarprodutoimagem');
Route::get('/destaque/{id}', [App\Http\Controllers\HomeController::class, 'destaque'])->name('destaque');
Route::post('/criaperfilproduto', [App\Http\Controllers\HomeController::class, 'criaperfilproduto'])->name('criaperfilproduto');
//Perfil
Route::get('/perfil/{id}', [App\Http\Controllers\HomeController::class, 'perfil'])->name('perfil');
Route::get('/apagavaga/{id}', [App\Http\Controllers\HomeController::class, 'apagavaga'])->name('apagavaga');
Route::post('/criaperfil', [App\Http\Controllers\HomeController::class, 'criaperfil'])->name('criaperfil');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categoria', [App\Http\Controllers\HomeController::class, 'categoria'])->name('categoria');
Route::get('/admcolaboradores', [App\Http\Controllers\HomeController::class, 'colaboradores'])->name('admcolaboradores');
Route::get('/create-storage-link', [StorageLinkController::class, 'createStorageLink']);



Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

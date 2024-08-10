<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

//Route::resource('produtos', ProdutoController::class);
Route::resource('users', UserController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('produto/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');
Route::get('carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('carrinho', [CarrinhoController::class, 'adicionaCarrinho'])->name('site.addCarrinho');
Route::post('remover', [CarrinhoController::class, 'removeCarrinho'])->name('site.removeCarrinho');
Route::post('atualizar', [CarrinhoController::class, 'atualizaCarrinho'])->name('site.atualizaCarrinho');
Route::get('limpar', [CarrinhoController::class, 'limparCarrinho'])->name('site.limparCarrinho');

Route::view('login', 'login.form')->name('login.form');
Route::post('auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('register', [LoginController::class, 'create'])->name('login.create');

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
Route::get('admin/produtos', [ProdutoController::class, 'index'])->name('admin.produtos');
Route::delete('admin/produto/delete/{id}', [ProdutoController::class, 'destroy'])->name('admin.produto.delete');
Route::post('admin/produto/store', [ProdutoController::class, 'store'])->name('admin.produto.store');
Route::put('admin/produto/update/{id}', [ProdutoController::class, 'update'])->name('admin.produto.update');
//Aprendendo sobre rotas
/*
Route::get('/empresa', function(){
    return view('site/empresa');
});

//Permite todo tipo de acesso http (get, post, put e delete)
Route::any('/any', function(){
    return "Permite Tudo";
});

//Permite apenas acessos definidos
Route::match(['get', 'post'], '/match', function(){
    return "Permite apenas definidos";
});

//Passagem de parâmetro
Route::get('/produto/{id?}/{nome?}', function($id = '', $nome = ''){
    return "O id do produto é: " . $id . "<br>O nome é: " . $nome;
});

//Redirecionando para outro página

//Forma 1 
Route::get('/sobre', function(){
    return redirect('/empresa');
});

//Forma 2
Route::redirect('/sobre', '/empresa');


//Ir para a view
Route::view('/empresa', 'site/empresa');

//Nomeando rotas e chamando elas

Route::get('/news', function(){
    return view('news');
})->name('noticias');

Route::get('/novidades', function(){
    return redirect()->route('noticias');
});


//Agrupar por nome e prefixo

Route::group([
    'prefix' => 'admin', //Prefixo
    'as' => 'admin' //Nome
], function(){
    Route::get('dashboard', function(){
        return "dashboard";
    })->name('dashboard');
    
    Route::get('user', function(){
        return "user";
    })->name('user');
});
*/

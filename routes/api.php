<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

/*
|-------------------------------------------------------------------------
| Rotas de API
|--------------------------------------------------------------------------
|
| Aqui você pode registrar rotas de API para sua aplicação. Essas
| rotas são carregadas pelo RouteServiceProvider dentro de um grupo
| ao qual é atribuído o grupo de middleware "api".
|-------------------------------------------------------------------------
| Divirta-se melhorando minha API! github.com/edmarpires9
|-------------------------------------------------------------------------
*/
/*Através do método http GET é possivel buscar um post passando o ID
Exemplo: http://127.0.0.1:8000/api/posts/1 para obter o post com primary key de valor 1.
É possivel acessar o link através do navegador
*/
Route::get('/posts/{id}', [PostsController::class, 'filtrarPostsPorID']);
//Rota para retornar todos usuários
Route::get('/posts', [PostsController::class, 'retornarTodosPosts']);
/*Recomendo utilização de ferramentas como postman ou insonia
para facilitar testar os metodos HTTP POST,PUT,DELETE
No Postman lembre de selecionar o metodo correto POST, digitar a rota para criar novo post
http://127.0.0.1:8000/api/posts/
e na hora de fazer o envio, envie um RAW do tipo JSON
Exemplo:
{
  "title": "Novo post",
  "content": "Adicionar um post nunca foi tão fácil"
}
*/
Route::post('/posts', [PostsController::class, 'criarNovoPost']);

/*No Postman selecione o metodo PUT, digite a rota para atualizar um post é OBRIGATORIO
fornecer um id nesta rota esse id corresponde a chave primaria do registro a ser atualizado
no banco de dados
http://127.0.0.1:8000/api/posts/1
e na hora de fazer o envio, envie um RAW do tipo JSON
Exemplo:
{
  "title": "Novo post",
  "content": "Refatorar um post é boa pratica"
}
*/
Route::put('/posts/{id}', [PostsController::class, 'atualizarUmPostPorID']);

/*No Postman selecione o metodo DELETE, digite a rota para atualizar um post é OBRIGATORIO
fornecer um id nesta rota esse id corresponde a chave primaria do registro a ser atualizado
no banco de dados
http://127.0.0.1:8000/api/posts/2
*/
Route::delete('/posts/{id}', [PostsController::class, 'apagarUtilizandoID']);

<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

class PostsController extends Controller
{
    //Buscar um post que tenha a chave primaria igual ao integer $id recebido.
    public function filtrarPostsPorID(int $id)
    {
        //Programação orientada a objetos. Na pasta Models temos a classe Posts.php que herda métodos da Model do Laravel.
        $postModel = new Posts();
        $post = $postModel->find($id);
        if (!$post) {
            return response()->json(['message' => 'Post não existe! verifique o id fornecido!', 'id' => $id], 404);
        }
        return response()->json($post);
    }

    //Obter todos os posts
    public function retornarTodosPosts()
    {
        $postsModel = new Posts();
        $posts = $postsModel->all();
        return response()->json($posts);
    }

    //Criar um novo Post
    public function criarNovoPost(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Criando via Model (Eloquent)
        $post = Posts::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return response()->json(['message' => 'Post criado com sucesso!', 'id' => $post->id], 201);
    }

    //Atualizar um post que tenha a chave primaria igual ao $id recebido,
    public function atualizarUmPostPorID(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Buscar o post pelo ID
        $post = Posts::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post não encontrado!'], 404);
        }

        // Atualizar os dados usando fill() ou update()
        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return response()->json(['message' => 'Post atualizado com sucesso!']);
    }

    //Deleta um post é necessário fornecer o id
    public function apagarUtilizandoID($id)
    {
        // Tenta encontrar o post pelo ID
        $post = Posts::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post id => ' . $id . ' não encontrado!'], 404);
        }

        // Deleta o post
        $post->delete();

        return response()->json(['message' => 'Post excluído com sucesso!']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class PostsController extends Controller
{
    //Buscar um post que tenha a chave primaria igual ao $id recebido
    public function filtrarPostsPorID(Posts $id)
    {
        return $id;
    }
    //Obter todos os posts
    public function retornarTodosPosts()
    {
        $posts = DB::table('posts')->get();
        return response()->json($posts);
    }
    //Criar um novo Post
    public function criarNovoPost(Request $request)
    {
        // Validação simples (opcional, mas recomendado)
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Inserção no banco
        $id = DB::table('posts')->insertGetId([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'created_at' => now(),
        ]);

        return response()->json(['message' => 'Post criado com sucesso!', 'id' => $id], 201);
    }
    //Atualizar um post que tenha a chave primaria igual ao $id recebido,
    public function atualizarUmPostPorID(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Verificar se o post existe
        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            return response()->json(['message' => 'Post não encontrado!'], 404);
        }

        // Atualizar o post no banco
        DB::table('posts')->where('id', $id)->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Post atualizado com sucesso!']);
    }
    //Apagar um post que tenha a chave primaria igual ao $id recebido.
    public function apagarUtilizandoID($id)
    {
        // Verificar se o post existe
        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            return response()->json(['message' => 'Post não encontrado!'], 404);
        }

        // Excluir o post
        DB::table('posts')->where('id', $id)->delete();

        return response()->json(['message' => 'Post excluído com sucesso!']);
    }
}

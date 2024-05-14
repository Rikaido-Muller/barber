<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barbearia;
class BarbeariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $barbearias = Barbearia::where('nome', 'like', '%'.$search.'%')
                         ->orWhere('bairro', 'like', '%'.$search.'%')
                         ->paginate(10);

        return view('barbearias.index', compact('barbearias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barbearias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barbearias = new Barbearia([
            'nome' => $request->input('nome'),
            'rua' => $request->input('rua'),
            'bairro' => $request->input('bairro')

            
        ]);

        $barbearias->save();

        return redirect()->route('barbearias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Encontra um autor no banco de dados com o ID fornecido
        $barbearia = Barbearia::findOrFail($id);
        // Retorna a view 'autores.show' e passa o autor como parâmetro
        return view('barbearias.show', compact('barbearia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
   // Encontra um autor no banco de dados com o ID fornecido
   $barbearia = Barbearia::findOrFail($id);
   // Retorna a view 'autores.edit' e passa o autor como parâmetro
   return view('barbearias.edit', compact('barbearia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Encontra um autor no banco de dados com o ID fornecido
        $barbearia = Barbearia::findOrFail($id);
        // Atualiza os campos do autor com os dados fornecidos no request
        $barbearia->nome = $request->input('nome');
        $barbearia->rua = $request->input('rua');
        $barbearia->bairro = $request->input('bairro');
        // Salva as alterações no barbearia
        $barbearia->save();
        // Redireciona para a rota 'barbearias.index' após salvar
        return redirect()->route('barbearias.index')->with('success', 'Barbearia criada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encontra um autor no banco de dados com o ID fornecido
        $barbearia = Barbearia::findOrFail($id);
        // Exclui o autor do banco de dados
        $barbearia->delete();
        // Redireciona para a rota 'autores.index' após excluir
        return redirect()->route('barbearias.index')->with('success', 'Barbearia Excluida com sucesso!');
    }
}

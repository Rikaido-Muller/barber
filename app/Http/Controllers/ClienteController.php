<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $clientes = Cliente::where('nome', 'like', '%'.$search.'%')
                         ->orWhere('telefone', 'like', '%'.$search.'%')
                         ->paginate(10);

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clientes = new Cliente([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email')

            
        ]);

        $clientes->save();

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Encontra um autor no banco de dados com o ID fornecido
        $cliente = Cliente::findOrFail($id);
        // Retorna a view 'autores.show' e passa o autor como parâmetro
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
   // Encontra um autor no banco de dados com o ID fornecido
   $cliente = Cliente::findOrFail($id);
   // Retorna a view 'autores.edit' e passa o autor como parâmetro
   return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Encontra um autor no banco de dados com o ID fornecido
        $cliente = Cliente::findOrFail($id);
        // Atualiza os campos do autor com os dados fornecidos no request
        $cliente->nome = $request->input('nome');
        $cliente->telefone = $request->input('telefone');
        $cliente->email = $request->input('email');
        // Salva as alterações no cliente
        $cliente->save();
        // Redireciona para a rota 'clientes.index' após salvar
        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encontra um autor no banco de dados com o ID fornecido
        $cliente = Cliente::findOrFail($id);
        // Exclui o autor do banco de dados
        $cliente->delete();
        // Redireciona para a rota 'autores.index' após excluir
        return redirect()->route('clientes.index')->with('success', 'Cliente Excluido com sucesso!');
    }
}

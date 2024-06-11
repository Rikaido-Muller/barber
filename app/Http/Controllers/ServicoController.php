<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;
class ServicoController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $servicos = Servico::paginate(10);

        return view('servicos.index', compact('servicos'));
    }

    public function create()
    {
        return view('servicos.create');
    }

    public function store(Request $request)
    {

        $servicos = new Servico([
            'nome' => $request->input('nome'),
            'valor' => $request->input('valor'),
            'duracao' => $request->input('duracao'),
            
        ]);

        $servicos->save();

        return redirect()->route('servicos.index');
    }


    public function show(string $id)
    {
       
        $servico = Servico::findOrFail($id);

        return view('servicos.show', compact('servicos'));
    }

 
    public function edit(string $id)
    {
 
   $servico = Servico::findOrFail($id);


   return view('servicos.edit', compact('servico'));
    }


    public function update(Request $request, string $id)
    {
        
        $servico = Servico::findOrFail($id);
      
        $servico->nome = $request->input('nome');
        $servico->valor = $request->input('valor');
        $servico->duracao = $request->input('duracao');



        $servico->save();
        
        return redirect()->route('servicos.index')->with('success', 'Servico criado com sucesso!');
    }


    public function destroy(string $id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();
        return redirect()->route('servicos.index')->with('success', 'Servico Excluido com sucesso!');
    }
}

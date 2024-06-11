<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barbeiro;
use App\Models\Barbearia;
class BarbeirosController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $barbeiros = Barbeiro::where('nome', 'like', '%'.$search.'%')
                         ->orWhere('telefone', 'like', '%'.$search.'%')
                         ->paginate(10);

        return view('barbeiros.index', compact('barbeiros'));
    }

    public function create()
    {
        $barbearias = Barbearia::all();
        return view('barbeiros.create', compact('barbearias'));
    }

    public function store(Request $request)
    {

        $barbeiros = new Barbeiro([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
            'id_barbearia' => $request->input('id_barbearia')

            
        ]);

        $barbeiros->save();

        return redirect()->route('barbeiros.index');
    }


    public function show(string $id)
    {
       
        $barbeiro = Barbeiro::findOrFail($id);

        return view('barbeiros.show', compact('barbeiro'));
    }

 
    public function edit(string $id)
    {
 
   $barbeiro = Barbeiro::findOrFail($id);

   $barbearia = Barbearia::findOrFail($id);

   return view('barbeiros.edit', compact('barbeiro', 'barbearias'));
    }


    public function update(Request $request, string $id)
    {
        
        $barbeiro = Barbeiro::findOrFail($id);
      
        $barbeiro->nome = $request->input('nome');
        $barbeiro->telefone = $request->input('telefone');
        $barbeiro->email = $request->input('email');
        $barbeiro->id_barbearia = $request->input('id_barbearia');


        $barbeiro->save();
        
        return redirect()->route('barbeiros.index')->with('success', 'Barbeiro criado com sucesso!');
    }


    public function destroy(string $id)
    {
        $barbeiro = Barbeiro::findOrFail($id);
        $barbeiro->delete();
        return redirect()->route('barbeiros.index')->with('success', 'Barbeiro Excluido com sucesso!');
    }
}

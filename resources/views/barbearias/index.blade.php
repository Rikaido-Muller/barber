<x-app-layout>

 <!--<link rel="stylesheet" href="{{ asset('css/barbearias/index.css') }}">-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Lista Barbearias') }}
        </h2>
    </x-slot>
    <div class="container">
        <form action="{{ route('barbearias.index') }}" method="GET" class="search-form">
            <div class="search-container">
                <input type="text" name="search" placeholder="Pesquisar Barbearias..." value="{{ request()->query('search') }}" class="search-input">
                <button type="submit" class="search-button">Pesquisar</button>
            </div>
        </form>
        <a href="{{ route('barbearias.create') }}" class="btn btn-primary">Nova Barbearia</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barbearias as $barbearia)
                    <tr>
                        <td class="colunas">{{ $barbearia->id }}</td>
                        <td id="nome">{{ $barbearia->nome }}</td>
                        <td class="colunas">{{ $barbearia->rua}}</td>
                        <td>{{ $barbearia->bairro }}</td>
                        <td>
                            <a href="{{ route('barbearias.show', $barbearia->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('barbearias.edit', $barbearia->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('barbearias.destroy', $barbearia->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $barbearias->links() }}
        <br>
    </div>
</x-app-layout>
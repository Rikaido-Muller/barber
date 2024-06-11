<x-app-layout>
<head>
<link rel="stylesheet" href="{{ asset('css/barbeiros/index.css') }}">
<script src="{{asset('js/barbeiros.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Lista Barbeiros') }}
        </h2>
    </x-slot>
    <div class="container">
        <form action="{{ route('barbeiros.index') }}" method="GET" class="search-form">
            <div class="search-container">
                <input type="text" name="search" placeholder="Pesquisar barbeiros..." value="{{ request()->query('search') }}" class="search-input">
                <button type="submit" class="search-button">Pesquisar</button>
            </div>
        </form>
        <a href="{{ route('barbeiros.create') }}" class="btn btn-primary">Novo Barbeiro</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Barbearia</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barbeiros as $barbeiro)
                    <tr>
                        <td class="colunas">{{ $barbeiro->id }}</td>
                        <td id="nome">{{ $barbeiro->nome }}</td>
                        <td class="colunas">{{ $barbeiro->telefone}}</td>
                        <td>{{ $barbeiro->email }}</td>
                        <td>{{$barbeiro->barbearias->nome}}</td>
                        <td>
                            <a href="{{ route('barbeiros.show', $barbeiro->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('barbeiros.edit', $barbeiro->id) }}" class="btn btn-warning">Editar</a>
                            <form id="form-{{ $barbeiro->id}}" action="{{route('barbeiros.destroy', $barbeiro->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger"
                                        onclick="deletar({{$barbeiro->id}})">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $barbeiros->links() }}
        <br>    
    </div>
</x-app-layout>
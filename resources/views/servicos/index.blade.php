<x-app-layout>
<head>
<link rel="stylesheet" href="{{ asset('css/servicos/index.css') }}">
<script src="{{asset('js/servicos.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Lista Servicos') }}
        </h2>
    </x-slot>
    <div class="container">
        <form action="{{ route('servicos.index') }}" method="GET" class="search-form">
            <div class="search-container">
                <input type="text" name="search" placeholder="Pesquisar Servicos..." value="{{ request()->query('search') }}" class="search-input">
                <button type="submit" class="search-button">Pesquisar</button>
            </div>
        </form>
        <a href="{{ route('servicos.create') }}" class="btn btn-primary">Novo Serviço</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Duração (min)</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicos as $servico)
                    <tr>
                        <td class="colunas">{{ $servico->id }}</td>
                        <td id="nome">{{ $servico->nome }}</td>
                        <td class="colunas">{{ $servico->valor}}</td>
                        <td>{{ $servico->duracao }}</td>
                        <td>
                            <a href="{{ route('servicos.show', $servico->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('servicos.edit', $servico->id) }}" class="btn btn-warning">Editar</a>
                            <form id="form-{{ $servico->id}}" action="{{route('servicos.destroy', $servico->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger"
                                        onclick="deletar({{$servico->id}})">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $servicos->links() }}
        <br>
    </div>
</x-app-layout>
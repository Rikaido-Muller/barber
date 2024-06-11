<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/barbeiros/create.css') }}">
        <title>Novo Barbeiro</title>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Criar barbeiros') }}
        </h2>
    </x-slot>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Sucesso!</strong>
        <span class="block sm:inline">{{ session('success') }}</div>
        </div>
    @endif
    <body>
        <div class="container">
            <form action="{{ route('barbeiros.store') }}" method="POST">
                <!-- Token CSRF para proteção contra ataques CSRF -->
                @csrf
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text" name="email" required>
                </div>
                <div class="form-group">
                <label for="id_barbearia">Barbearia</label>
                <select class="form-control" name="id_barbearia" required>
                    <option value="">Selecione uma barbearia</option>
                    @foreach($barbearias as $barbearia)
                        <option value="{{ $barbearia->id }}">{{ $barbearia->nome }}</option>
                    @endforeach
                </select>
            </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('barbeiros.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
</x-app-layout>
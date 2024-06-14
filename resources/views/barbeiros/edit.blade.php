<x-app-layout>
    <head>
    <link rel="stylesheet" href="{{ asset('css/barbeiros/edit.css') }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Barbeiro</title>
    </head>
    <body>
        <div class="container">
            <h1>Editar Barbeiro</h1>
            <form action="{{ route('barbeiros.update', $barbeiro->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" value="{{ $barbeiro->nome }}">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" value="{{ $barbeiro->telefone }}">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text" name="email" value="{{ $barbeiro->email }}">
                </div>
                <div class="form-group">
                <label for="id_barbearia">Barbearia</label>
                <select class="form-control" name="id_barbearia" required>
                    <option value="">Selecione uma barbearia</option>
                    @foreach($autores as $autor)
                        <option value="{{ $barbearia->id }}" {{ $autor->id == $barbeiro->barbearia_id ? 'selected' : '' }}>{{ $barbearia->nome }}</option>
                    @endforeach
                </select>
            </div>
                <button type="submit" class="btn btn-success">Salvar Alterações</button>
                <a href="{{ route('barbeiros.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
</x-app-layout>
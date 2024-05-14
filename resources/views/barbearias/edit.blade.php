<x-app-layout>
    <head>
     <!--<link rel="stylesheet" href="{{ asset('css/barbearias/edit.css') }}">-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Barbearia</title>
    </head>
    <body>
        <div class="container">
            <h1>Editar Barbearia</h1>
            <form action="{{ route('barbearias.update', $barbearia->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" value="{{ $barbearia->nome }}">
                </div>
                <div class="form-group">
                    <label for="rua">Rua:</label>
                    <input type="text" name="rua" value="{{ $barbearia->rua }}">
                </div>  
                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" name="bairro" value="{{ $barbearia->bairro }}">
                </div>
                <button type="submit" class="btn btn-success">Salvar Alterações</button>
                <a href="{{ route('barbearias.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
</x-app-layout>
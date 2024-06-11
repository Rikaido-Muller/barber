<x-app-layout>
    <head>
    <link rel="stylesheet" href="{{ asset('css/servicos/edit.css') }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Serviço</title>
    </head>
    <body>
        <div class="container">
            <h1>Editar Servico</h1>
            <form action="{{ route('servicos.update', $servico->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" value="{{ $servico->nome }}">
                </div>
                <div class="form-group">
                    <label for="valor">Valor:</label>
                    <input type="text" name="valor" value="{{ $servico->telefone }}">
                </div>
                <div class="form-group">
                    <label for="duracao">Duração (min):</label>
                    <input type="text" name="duracao" value="{{ $servico->email }}">
                </div>
                <button type="submit" class="btn btn-success">Salvar Alterações</button>
                <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
</x-app-layout>
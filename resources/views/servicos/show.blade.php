<x-app-layout>
    <head>
    <link rel="stylesheet" href="{{ asset('css/servicos/show.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Servico') }}
        </h2>
    </x-slot>
    <section class="author-details">
      <div class="author-content">
        <div class="author-meta">
          <span class="author-label">ID:</span>
          <span class="author-info">{{ $servico->id }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Nome:</span>
          <span class="author-info">{{ $servico->nome }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Valor:</span>
          <span class="author-info">{{ $servico->valor }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Duração (min)</span>
          <span class="author-info">{{ $servico->duracao }}</span>
        </div>
      </div>
      <a href="{{ route('servicos.index') }}" class="btn-return">Voltar</a>
    </section>
  </x-app-layout>
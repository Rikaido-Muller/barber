<x-app-layout>
    <head>
    <link rel="stylesheet" href="{{ asset('css/ /show.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barbeiros') }}
        </h2>
    </x-slot>
    <section class="author-details">
      <div class="author-content">
        <div class="author-meta">
          <span class="author-label">ID:</span>
          <span class="author-info">{{ $barbeiro->id }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Nome:</span>
          <span class="author-info">{{ $barbeiro->nome }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Telefone:</span>
          <span class="author-info">{{ $barbeiro->telefone }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">E-mail</span>
          <span class="author-info">{{ $barbeiro->email }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Barbearia</span>
          <span class="author-info">{{ $barbeiro->barbearias->nome }}</span>
        </div>
      </div>
      <a href="{{ route('barbeiros.index') }}" class="btn-return">Voltar</a>
    </section>
  </x-app-layout>
<x-app-layout>
    <head>
     <!--<link rel="stylesheet" href="{{ asset('css/barbearias/show.css') }}">-->
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barbearias') }}
        </h2>
    </x-slot>
    <section class="author-details">
      <div class="author-content">
        <div class="author-meta">
          <span class="author-label">ID:</span>
          <span class="author-info">{{ $barbearia->id }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Nome:</span>
          <span class="author-info">{{ $barbearia->nome }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Rua:</span>
          <span class="author-info">{{ $barbearia->rua }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Bairro:</span>
          <span class="author-info">{{ $barbearia->bairro }}</span>
        </div>
      </div>
      <a href="{{ route('barbearias.index') }}" class="btn-return">Voltar</a>
    </section>
  </x-app-layout>
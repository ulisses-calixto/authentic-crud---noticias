<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $noticia->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-gray-800 mb-4">{{ $noticia->conteudo }}</p>

            <p class="text-sm text-gray-500">Autor: {{ $noticia->user->name }}</p>
            <p class="text-sm text-gray-500">Criado em: {{ $noticia->created_at->format('d/m/Y H:i') }}</p>

            <a href="{{ route('noticias.index') }}" class="inline-block mt-4 px-6 py-2 border text-gray-900 rounded">Voltar</a>
        </div>
    </div>
</x-app-layout>

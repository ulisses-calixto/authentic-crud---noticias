<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Criar Notícia
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('noticias.store') }}" method="POST">
                @csrf

                <label class="block font-medium text-gray-800">Título:</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}" required class="w-full border-gray-300 rounded mt-1 mb-4">

                <label class="block font-medium text-gray-800">Conteúdo:</label>
                <textarea name="conteudo" rows="5" required class="w-full border-gray-300 rounded mt-1 mb-4">{{ old('conteudo') }}</textarea>
                
                <button type="submit" class="inline-block px-6 py-2 border text-gray-900 rounded">Salvar</button>
                <a href="{{ route('noticias.index') }}" class="inline-block px-4 py-2 text-gray-500 hover:text-gray-900">Cancelar</a>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Notícias
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <a href="{{ route('noticias.create') }}" class="text-blue-500 hover:underline">+ Criar nova notícia</a>
    
                @if(session('success'))
                    <p class="text-green-600 mt-2">{{ session('success') }}</p>
                @endif
    
                <ul>
                    @foreach ($noticias as $noticia)
                        <li class="p-4 mb-4 mt-4 bg-white shadow rounded">
                            <a href="{{ route('noticias.show', $noticia) }}" class="font-bold text-lg text-gray-800 hover:underline">
                                {{ $noticia->titulo }}
                            </a>
                            <p class="text-sm text-gray-600">por {{ $noticia->user->name }}</p>
    
                            <div class="mt-4 flex gap-4">
                                <a href="{{ route('noticias.edit', $noticia) }}" class="inline-block px-6 py-2  border text-gray-900 rounded">Editar</a>
    
                                <form action="{{ route('noticias.destroy', $noticia) }}" method="POST" onsubmit="return confirm('Tem certeza?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block px-4 py-2 text-gray-500 hover:text-gray-900">Excluir</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-4">
                {{ $noticias->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 flex justify-between items-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">Confira as últimas novidades e dicas.</p>
                
                <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white transition ease-in-out duration-150 shadow-md">
                    ➕ Novo Post
                </a>
            </div>

            <div class="space-y-6">
                @forelse($posts as $post)
                    <article class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100 dark:border-gray-700/50 flex flex-col justify-between">
                        
                        <div class="mb-4">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" 
                                     class="w-48 h-48 object-cover rounded-lg shadow-sm">
                            @else
                                <div class="w-48 h-48 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center border border-gray-200 dark:border-gray-600">
                                    <span class="text-xs text-gray-400 dark:text-gray-500">Sem imagem</span>
                                </div>
                            @endif
                        </div>

                        <div>
                            <div class="flex items-center space-x-2 mb-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-400">
                                    @foreach ($categorias as $categoria)
                                        @if($categoria->id == $post->categorias_id)
                                            # {{ $categoria->name }}
                                        @endif
                                    @endforeach
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3 tracking-tight">
                                {{ $post->title }}
                            </h3>

                            <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed mb-6 whitespace-pre-line">
                                {{ $post->text }}
                            </p>
                        </div>

                        <div class="border-t border-gray-100 dark:border-gray-700/60 pt-4 flex items-center justify-end space-x-3">
                            
                            <a href="{{ route('posts.edit', $post->id) }}" 
                               class="inline-flex items-center px-3 py-1.5 border border-gray-300 dark:border-gray-600 rounded text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition ease-in-out duration-150 shadow-sm">
                                Editar
                            </a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" 
                                  onsubmit="return confirm('Tem certeza que deseja deletar este post do blog permanente?');" class="inline">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase rounded tracking-wider transition ease-in-out duration-150 shadow-sm">
                                    Deletar
                                </button>
                            </form>

                        </div>

                    </article>
                @empty
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-12 text-center">
                        <p class="text-gray-500 dark:text-gray-400 text-lg">Nenhum post publicado ainda. Que tal criar o primeiro?</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
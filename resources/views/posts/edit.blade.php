<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ ('Editar Publicação') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg border border-gray-100 dark:border-gray-700/50">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    
                    <div class="mb-6 border-b border-gray-100 dark:border-gray-700/60 pb-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Modifique os campos abaixo para atualizar o conteúdo no blog.</p>
                    </div>

                    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT') <div class="space-y-6">
                            
                            <div>
                                <label for="categorias" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    Categoria do post
                                </label>
                                <div class="relative rounded-md shadow-sm">
                                    <select name="categorias_id" id="categorias" class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-300 focus:border-amber-500 focus:ring focus:ring-amber-500/20 transition duration-150 py-2 px-3">
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->id }}" {{ $post->categorias_id == $categoria->id ? 'selected' : '' }}>
                                                {{ $categoria->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    Título do post
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" 
                                           placeholder="Ex: Tendências de Corte de Cabelo para 2026"
                                           class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-300 focus:border-amber-500 focus:ring focus:ring-amber-500/20 transition duration-150 placeholder-gray-400 dark:placeholder-gray-500">
                                </div>
                            </div>

                            <div>
                                <label for="text" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    Conteúdo da Publicação
                                </label>
                                <div class="mt-1">
                                    <textarea name="text" id="text" rows="5" placeholder="Escreva os detalhes ou dicas do post aqui..."
                                              class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-300 focus:border-amber-500 focus:ring focus:ring-amber-500/20 transition duration-150 placeholder-gray-400 dark:placeholder-gray-500">{{ old('text', $post->text) }}</textarea>
                                </div>
                            </div>

                            <!-- INPUT DE IMAGEM -->
                            <div>
                                <div class="mt-2 mb-2">
                                    <label for="image">Imagem do Post:</label>
                                </div>

                                <!-- Mostrar imagem atual -->
                                @if($post->image)
                                    <div class="mb-4">
                                        <p class="text-sm text-gray-600 mb-2">Imagem atual:</p>
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="max-h-40 rounded-lg">
                                    </div>
                                @endif

                                <div class="mt-1 flex items-center">
                                    <input type="file" name="image" id="image" accept="image/*" class="block w-full text-sm text-gray-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-md file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-blue-50 file:text-blue-700
                                        hover:file:bg-blue-100"> 
                                </div>
                                <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF até 2MB (deixe em branco para não alterar)</p>
                                
                                <!-- Preview da nova imagem -->
                                <img id="preview" class="mt-4 max-h-64 rounded-lg" style="display:none;" alt="Preview">
                            </div>

                        </div>

                        <div class="mt-8 pt-4 border-t border-gray-100 dark:border-gray-700/60 flex items-center justify-end space-x-4">
                            
                            <a href="{{ route('posts.index') }}" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 transition duration-150">
                                Cancelar Alterações
                            </a>

                            <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold uppercase tracking-wider rounded-md shadow-sm transition ease-in-out duration-150">
                                Salvar Alterações
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Preview de imagem
        const fileInput = document.getElementById('image');
        const preview = document.getElementById('preview');

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
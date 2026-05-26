<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerenciar Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-6 border border-gray-100 dark:border-gray-700/50">
                
                <div class="mb-6">
                    <a href="{{ route('categorias.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white transition ease-in-out duration-150 shadow-sm">
                        ➕ Nova Categoria
                    </a>
                </div>
            
                <div class="text-gray-900 dark:text-gray-100 overflow-x-auto">
                    <table class="w-full min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-700/50">
                                <th class="text-left px-6 py-3 text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Nome da Categoria
                                </th>
                                <th class="text-center px-6 py-3 text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400 w-48">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($categorias as $categoria)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-400">
                                             {{ $categoria->name }}
                                        </span>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                        <div class="flex items-center justify-center space-x-3">
                                            
                                            <a href="{{ route('categorias.edit', $categoria->id) }}" 
                                               class="inline-flex items-center px-3 py-1.5 border border-gray-300 dark:border-gray-600 rounded text-xs font-bold uppercase tracking-wider text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition ease-in-out duration-150 shadow-sm">
                                                Editar
                                            </a>

                                            <form method="POST" action="{{ route('categorias.destroy', $categoria->id) }}" 
                                                  onsubmit="return confirm('Atenção: Deletar esta categoria pode afetar os posts vinculados a ela. Confirmar exclusão?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                
                                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase rounded tracking-wider transition ease-in-out duration-150 shadow-sm">
                                                    Deletar
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-8 text-center text-sm text-gray-500 dark:text-gray-400">
                                        Nenhuma categoria cadastrada ainda.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
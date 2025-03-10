<x-layout>

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto">
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-800">Gestion des Tags</h1>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-600 mr-2">Latifa Taybi</span>
                        <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white">
                            LT
                        </div>
                    </div>
                </div>
            </header>

            <!-- Permission Content -->
            <div class="p-6" id="permissions-content">
                <div class="mb-6 flex justify-between items-center">
                    <h2 class="text-xl font-semibold">Liste des Tags</h2>
                    <button onclick="opentagModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        <i class="fas fa-plus mr-2"></i> Créer un Tag
                    </button>
                </div>

                <!-- Permissions Table -->
                <div class="bg-white shadow rounded overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($tags as $tag)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$tag->id}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$tag->name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ route('tags.edit', $tag->id) }}" class="text-blue-600 hover:text-blue-900"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('tags.destroy', $tag->id) }}" class="ml-2 text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center" id="tag-modal">
                    <div class="bg-white rounded-lg p-6 w-full max-w-lg">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium">Créer un Tag</h3>
                            <button onclick="closetagModal()" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <form id="tagForm" action="{{ route('tags.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="tag-name">
                                    Nom du Tag
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" id="tag-name" name="name" type="text" placeholder="Ex: Voiture" required>
                            </div>
                            <div class="flex items-center justify-end">
                                <button type="button" onclick="closetagModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                    Annuler
                                </button>
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
   

                <!-- Pagination -->
                {{-- <div class="mt-4 flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Affichage de <span class="font-medium">1</span> à <span class="font-medium">4</span> sur <span class="font-medium">20</span> permissions
                    </div>
                    <div class="flex-1 flex justify-end">
                        <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Précédent
                        </button>
                        <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Suivant
                        </button>
                    </div>
                </div> --}}
            </div>
        </main>
    </div>

    <script>
        function opentagModal() {
            document.getElementById('tag-modal').classList.remove('hidden');
        }

        function closetagModal() {
            document.getElementById('tag-modal').classList.add('hidden');
        }

        function openEditTagModal() {
            document.getElementById('edit-tag-modal').classList.remove('hidden');
        }

        function closeEditTagModal() {
            document.getElementById('edit-tag-modal').classList.add('hidden');
        }
    </script>
</x-layout>
<x-layout>

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto">
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-800">Gestion des Rôles</h1>
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
                    <h2 class="text-xl font-semibold">Liste des Rôles</h2>
                    <button onclick="openRoleModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        <i class="fas fa-plus mr-2"></i> Créer un Rôle
                    </button>
                </div>

                @foreach ($roles as $role)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 mb-6 overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">{{$role->name}}</h2>
                            <div class="flex space-x-4">
                                <!-- Icône de modification -->
                                <a href="{{route('editRole',$role->id)}}" class="text-blue-500 hover:text-blue-600 transition-colors duration-200">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Icône de suppression -->
                                <a href="{{route('deleteRole',$role->id)}}" class="text-red-500 hover:text-red-600 transition-colors duration-200">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="space-y-3">
                            @foreach ($role->permissions as $perm)
                            <p class="text-gray-600 flex items-center">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                {{$perm->name}}
                            </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach


                <!-- Modal for creating/editing roles (hidden by default) -->
                <div class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center" id="role-modal">
                    <div class="bg-white rounded-lg p-6 w-full max-w-lg">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium">Créer un Rôle</h3>
                            <button onclick="closeRoleModal()" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <form id="roleForm" method="POST" action="{{ route('addRole') }}">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="role-name">
                                    Nom du Rôle
                                </label>
                                <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" id="role-name" type="text" placeholder="Ex: Admin" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    Permissions
                                </label>
                                <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach($permissions as $permission)
                                        <div class="flex items-center bg-white p-1 rounded-lg shadow-md border border-gray-300 hover:bg-gray-100 transition duration-200">
                                            <input type="checkbox" class="form-checkbox h-6 w-4 text-blue-600 focus:ring-blue-500 cursor-pointer" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}">
                                            <label for="permission-{{ $permission->id }}" class="ml-1 text-gray-800 font-small cursor-pointer">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex items-center justify-end">
                                <a href=""><button type="button" onclick="closeRoleModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                    Annuler
                                </button></a>
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
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
        function openRoleModal() {
            document.getElementById('role-modal').classList.remove('hidden');
        }

        function closeRoleModal() {
            document.getElementById('role-modal').classList.add('hidden');
        }
    </script>
</x-layout>
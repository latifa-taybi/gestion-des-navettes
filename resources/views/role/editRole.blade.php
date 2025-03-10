<x-layout>
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center" id="edit-role-modal">
        <div class="bg-white rounded-lg p-6 w-full max-w-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium">Modifier un Rôle</h3>
                <button onclick="closeEditRoleModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="roleForm" action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="role-name">
                        Nom du Rôle
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" id="role-name" name="name" type="text" value="{{ $role->name }}" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Permissions
                    </label>
                    <div class="mt-2">
                        @foreach($permissions as $permission)
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                <span class="ml-2">{{ $permission->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <button type="button" onclick="closeEditRoleModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                        Annuler
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function closeEditRoleModal() {
            document.getElementById('edit-role-modal').classList.add('hidden');
        }
    </script>
</x-layout>
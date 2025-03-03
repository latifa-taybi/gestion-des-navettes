<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription et de connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div id="register-form" class="w-full max-w-md bg-white p-6 rounded-lg shadow-md mt-8">
        <h2 class="text-2xl font-bold text-center mb-6">S'inscrire</h2>

        <form action="{{ route('registre') }}" method="POST">
            @csrf
            <!-- Nom -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            
            <!-- Mot de passe -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Choix du rôle -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Choisir un rôle</label>
                <select id="role" name="role" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="1">Client</option>
                    <option value="2">société</option>
                </select>
            </div>
            <!-- Soumettre -->
            <button type="submit" id="register-submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">S'inscrire</button>
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Déjà un compte ? <a href="/login" class="text-blue-500 hover:text-blue-700">Se connecter</a></p>
            </div>
        </form>
    </div>

</body>
</html>

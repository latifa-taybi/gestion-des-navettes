<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription et de connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <!-- Formulaire de connexion -->
    <div id="login-form" class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Se connecter</h2>
        
        <form action="{{route('connecter')}}" method="POST">
            @csrf
            <!-- Email -->
            <div class="mb-4">
                <label for="login-email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="login-email" name="email" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            
            <!-- Mot de passe -->
            <div class="mb-4">
                <label for="login-password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="login-password" name="password" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            
            <!-- Soumettre -->
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Se connecter</button>
            
            
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Pas encore de compte ? <a href="/registre" class="text-blue-500 hover:text-blue-700">S'inscrire</a></p>
            </div>

        </form>
    </div>

</body>
</html>

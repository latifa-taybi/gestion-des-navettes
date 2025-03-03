<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Société</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-600 p-4 text-white flex justify-between items-center shadow-lg">
            <h1 class="text-lg font-semibold flex items-center"><i class="ph ph-bus mr-2"></i>Plateforme de Transport</h1>
            <div>
                <a href="#" class="px-4 flex items-center"><i class="ph ph-user-circle mr-2"></i>Profil</a>
                <a href="#" class="px-4 flex items-center"><i class="ph ph-sign-out mr-2"></i>Déconnexion</a>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container mx-auto p-6">
            <h2 class="text-3xl font-bold mb-6 text-gray-800 flex items-center"><i class="ph ph-dashboard mr-2"></i>Dashboard Société</h2>
            
            <!-- Statistiques -->
            {{-- <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-white p-6 shadow-lg rounded-lg flex items-center">
                    <i class="ph ph-list text-blue-600 text-4xl mr-4"></i>
                    <div>
                        <h3 class="text-lg font-semibold">Offres créées</h3>
                        <p class="text-3xl font-bold">0</p>
                    </div>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-lg flex items-center">
                    <i class="ph ph-users text-green-600 text-4xl mr-4"></i>
                    <div>
                        <h3 class="text-lg font-semibold">Abonnés</h3>
                        <p class="text-3xl font-bold">0</p>
                    </div>
                </div>
            </div> --}}

            <!-- Actions -->
            <div class="flex space-x-4 mb-6">
                <a href={{ route('offre.create') }} class="bg-green-500 text-white px-6 py-3 rounded flex items-center shadow-md hover:bg-green-600">
                    <i class="ph ph-plus-circle mr-2"></i>Créer une Offre
                </a>
            </div>

            <!-- Liste des Offres -->
            <h2 class="text-2xl font-bold mb-4 text-gray-800 flex items-center"><i class="ph ph-list mr-2"></i>Offres Disponibles</h2>
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="p-3 border-b">Ville de départ</th>
                            <th class="p-3 border-b">Ville d'arrivée</th>
                            <th class="p-3 border-b">Date de début</th>
                            <th class="p-3 border-b">Date de fin</th>
                            <th class="p-3 border-b">Places</th>
                            <th class="p-3 border-b">Prix</th>
                            <th class="p-3 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offres as $offre)
                        <tr> 
                            <td class="p-3 border-b">{{$offre->ville_depart}}</td>
                            <td class="p-3 border-b">{{$offre->ville_arrivee}}</td>
                            <td class="p-3 border-b">{{$offre->date_depart}}</td>
                            <td class="p-3 border-b">{{$offre->date_arrivee}}</td>
                            <td class="p-3 border-b">{{$offre->place_dispo}}</td>
                            <td class="p-3 border-b">{{$offre->prix}}</td>
                            <td class="p-3 border-b flex space-x-2">
                                <a href={{route('offre.edit',$offre->id) }} class="text-blue-500 flex items-center"><i class="ph ph-pencil mr-1"></i>Modifier</a>
                                <a href="/deleteOffre/{{$offre->id}}" class="text-red-500 flex items-center"><i class="ph ph-trash mr-1"></i>Supprimer</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

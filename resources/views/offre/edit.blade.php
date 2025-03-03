<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre a jour une Offre</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 flex items-center"><i class="ph ph-plus-circle mr-2"></i>Mettre a jour l'offre</h2>

        <form class="bg-white p-6 shadow-lg rounded-lg" action="/updateOffre/{{$offre->id}}" method="POST">
            @csrf
            <input type="hidden" name="societe_id" value="{{$offre->societe_id}}">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Titre de l'offre</label>
                <input type="text" name="titre" class="w-full p-3 border rounded" placeholder="Entrez le titre de l'offre" value="{{$offre->titre}}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Description de l'offre</label>
                <textarea type="text" name="description" class="w-full p-3 border rounded" placeholder="Entrez la description de l'offre">{{$offre->description}}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Ville de départ</label>
                <input type="text" name="ville_depart" class="w-full p-3 border rounded" placeholder="Entrez la ville de départ" value="{{$offre->ville_depart}}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Ville d'arrivée</label>
                <input type="text" name="ville_arrivee" class="w-full p-3 border rounded" placeholder="Entrez la ville d'arrivée" value="{{$offre->ville_arrivee}}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Date de début</label>
                <input type="date" name="date_depart" class="w-full p-3 border rounded" value="{{$offre->date_depart}}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Date de fin</label>
                <input type="date" name="date_arrivee" class="w-full p-3 border rounded" value="{{$offre->date_arrivee}}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nombre de places</label>
                <input type="number" name="place_dispo" class="w-full p-3 border rounded" placeholder="Ex: 50" value="{{$offre->place_dispo}}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Prix</label>
                <input type="number" name="prix" class="w-full p-3 border rounded" placeholder="Ex: 20$" value="{{$offre->prix}}">
            </div>

            <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded flex items-center shadow-md hover:bg-green-600">
                <i class="ph ph-check-circle mr-2"></i>Modifier l'offre
            </button>
        </form>
    </div>
</body>
</html>

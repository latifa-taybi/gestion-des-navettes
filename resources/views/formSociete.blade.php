<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire d'Inscription</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

  <div class="max-w-2xl mx-auto bg-white p-8 mt-10 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-700 text-center mb-6">Formulaire d'Inscription</h2>

    <form action="{{route('createSociete')}}" method="POST" id="form-societe" class="mb-6 ">
        @csrf
        <p class="font-medium text-gray-600 mb-2">Informations sur la société :</p>
        <div class="space-y-4">
            <input type="text" name="user_id" value="{{user_id}}" hidden>
          <input type="text" name="name" placeholder="Nom de la société" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          <input type="url" name="logo" placeholder="Logo de la société" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          <textarea type="text" name="description" placeholder="Description de la société" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
          <input type="email" name="email" placeholder="Email de contact" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          <input type="tel" name="tele" placeholder="Téléphone de contact" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">S'inscrire</button>

        </div>
    </form>


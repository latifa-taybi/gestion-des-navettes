<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réservation de Navette</title>
  <!-- Lien vers le fichier CDN de Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Lien vers Font Awesome pour les icônes -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <style>
    /* Animation de survol */
    .hover-scale:hover {
      transform: scale(1.05);
      transition: transform 0.3s ease-in-out;
    }
    .button-hover:hover {
      background-color: #4CAF50;
      transition: background-color 0.3s ease;
    }
  </style>
</head>
<body class="bg-gray-100">

  <!-- Header de la page -->
  <header class="bg-blue-600 text-white p-6">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Réservation de Navette</h1>
      <a href="#" class="text-white hover:underline flex items-center">
        <i class="fas fa-user-circle mr-2"></i>Mon Compte
      </a>
    </div>
  </header>

  <!-- Contenu Principal -->
  <main class="py-12">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-semibold mb-8 text-center text-gray-800">Réservez votre trajet de navette</h2>

      <!-- Liste des Tickets de Navette -->
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Ticket 1 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover-scale transition-all">
          <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-blue-600">Navette A</h3>
            <i class="fas fa-bus-alt text-2xl text-blue-600"></i>
          </div>
          <p class="text-gray-600 mt-2">Départ: Paris Gare Montparnasse</p>
          <p class="text-gray-600">Arrivée: Aéroport Charles de Gaulle</p>
          <p class="text-gray-500">Date: 15 Mars 2025</p>
          <button class="bg-blue-600 text-white py-2 px-4 rounded-lg button-hover w-full mt-4 flex items-center justify-center">
            <i class="fas fa-check mr-2"></i> Réserver ce trajet
          </button>
        </div>

        <!-- Ticket 2 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover-scale transition-all">
          <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-blue-600">Navette B</h3>
            <i class="fas fa-bus-alt text-2xl text-blue-600"></i>
          </div>
          <p class="text-gray-600 mt-2">Départ: Gare Lyon</p>
          <p class="text-gray-600">Arrivée: Aéroport Orly</p>
          <p class="text-gray-500">Date: 16 Mars 2025</p>
          <button class="bg-blue-600 text-white py-2 px-4 rounded-lg button-hover w-full mt-4 flex items-center justify-center">
            <i class="fas fa-check mr-2"></i> Réserver ce trajet
          </button>
        </div>

        <!-- Ticket 3 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover-scale transition-all">
          <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-blue-600">Navette C</h3>
            <i class="fas fa-bus-alt text-2xl text-blue-600"></i>
          </div>
          <p class="text-gray-600 mt-2">Départ: Paris Gare Saint-Lazare</p>
          <p class="text-gray-600">Arrivée: Aéroport Beauvais</p>
          <p class="text-gray-500">Date: 17 Mars 2025</p>
          <button class="bg-blue-600 text-white py-2 px-4 rounded-lg button-hover w-full mt-4 flex items-center justify-center">
            <i class="fas fa-check mr-2"></i> Réserver ce trajet
          </button>
        </div>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-blue-600 text-white py-4 mt-12">
    <div class="container mx-auto text-center">
      <p>&copy; 2025 Réservation Navette. Tous droits réservés.</p>
    </div>
  </footer>

</body>
</html>

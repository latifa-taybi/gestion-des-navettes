<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickCook - Trouvez des recettes avec vos ingrédients</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .ingredient-tag {
            transition: all 0.3s ease;
        }
        .ingredient-tag:hover {
            transform: translateY(-2px);
        }
        .page {
            display: none;
        }
        .active {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-green-600 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold">QuickCook</h1>
                    <span class="text-sm ml-2">Cuisinez avec ce que vous avez</span>
                </div>
                
                <!-- Language Selector -->
                <div class="hidden md:flex items-center mr-4">
                    <select id="language-selector" class="bg-green-700 text-white px-2 py-1 rounded-md text-sm">
                        <option value="fr">Français</option>
                        <option value="en">English</option>
                    </select>
                </div>

                <!-- Nav Links -->
                <div class="hidden md:flex space-x-6">
                    <button class="nav-link font-medium hover:text-green-200" data-page="home">Accueil</button>
                    <button class="nav-link font-medium hover:text-green-200" data-page="search">Recherche</button>
                    <button class="nav-link font-medium hover:text-green-200" data-page="favorites">Favoris</button>
                </div>

                <!-- User Profile/Login -->
                <div class="flex items-center space-x-4">
                    <button id="login-button" class="bg-white text-green-600 px-4 py-1 rounded-md text-sm font-medium hover:bg-green-100">
                        Connexion
                    </button>
                    <div id="user-menu" class="hidden">
                        <button class="flex items-center text-white">
                            <span class="mr-2">Mon Compte</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <!-- Mobile menu button -->
                    <button class="md:hidden focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-6">
        <!-- Home Page -->
        <section id="home" class="page active">
            <div class="text-center my-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Cuisinez avec ce que vous avez déjà !</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Entrez les ingrédients dont vous disposez et découvrez des recettes délicieuses adaptées à votre cuisine.
                </p>
                <button class="nav-link mt-8 bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition" data-page="search">
                    Commencer maintenant
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 my-12">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Saisissez vos ingrédients</h3>
                    <p class="text-gray-600">
                        Entrez les ingrédients que vous avez dans votre cuisine.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Découvrez des recettes</h3>
                    <p class="text-gray-600">
                        Notre algorithme vous propose des recettes adaptées.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Cuisinez rapidement</h3>
                    <p class="text-gray-600">
                        Gagnez du temps et réduisez le gaspillage alimentaire.
                    </p>
                </div>
            </div>

            <div class="my-16">
                <h2 class="text-2xl font-bold text-center mb-8">Recettes populaires</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Sample Recipe Cards -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Image de recette</span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">Pasta Primavera</h3>
                            <div class="flex mb-3">
                                <div class="flex items-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">25 min</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">4 portions</span>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Pâtes</span>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Légumes</span>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Facile</span>
                            </div>
                            <button class="mt-2 text-green-600 font-medium hover:text-green-800">
                                Voir la recette
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Image de recette</span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">Omelette aux légumes</h3>
                            <div class="flex mb-3">
                                <div class="flex items-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">15 min</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">2 portions</span>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Œufs</span>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Légumes</span>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Rapide</span>
                            </div>
                            <button class="mt-2 text-green-600 font-medium hover:text-green-800">
                                Voir la recette
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Image de recette</span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">Curry de légumes</h3>
                            <div class="flex mb-3">
                                <div class="flex items-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">35 min</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">4 portions</span>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Curry</span>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Légumes</span>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Végétarien</span>
                            </div>
                            <button class="mt-2 text-green-600 font-medium hover:text-green-800">
                                Voir la recette
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Search/Recipe Generator Page -->
        <section id="search" class="page">
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-semibold mb-4">Que voulez-vous cuisiner aujourd'hui ?</h2>
                <div class="mb-6">
                    <label for="ingredients-input" class="block text-gray-700 font-medium mb-2">Vos ingrédients :</label>
                    <div class="flex">
                        <input type="text" id="ingredients-input" placeholder="Ex : tomates, oeufs, fromage..." 
                            class="flex-grow px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <button id="add-ingredient" class="bg-green-600 text-white px-4 py-2 rounded-r-md hover:bg-green-700">
                            Ajouter
                        </button>
                    </div>
                </div>

                <!-- Selected Ingredients Tags -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Ingrédients sélectionnés :</label>
                    <div id="selected-ingredients" class="flex flex-wrap gap-2 min-h-8">
                        <!-- Sample ingredients -->
                        <div class="ingredient-tag bg-green-100 text-green-800 px-3 py-1 rounded-full flex items-center">
                            <span>tomates</span>
                            <button class="ml-2 text-green-600 hover:text-green-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="ingredient-tag bg-green-100 text-green-800 px-3 py-1 rounded-full flex items-center">
                            <span>oignons</span>
                            <button class="ml-2 text-green-600 hover:text-green-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label for="meal-type" class="block text-gray-700 font-medium mb-2">Type de plat :</label>
                        <select id="meal-type" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="all">Tous les plats</option>
                            <option value="starter">Entrée</option>
                            <option value="main">Plat principal</option>
                            <option value="dessert">Dessert</option>
                            <option value="snack">Encas</option>
                        </select>
                    </div>
                    <div>
                        <label for="prep-time" class="block text-gray-700 font-medium mb-2">Temps de préparation :</label>
                        <select id="prep-time" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="all">Tous les temps</option>
                            <option value="quick">Rapide (< 15 min)</option>
                            <option value="medium">Moyen (15-30 min)</option>
                            <option value="long">Long (> 30 min)</option>
                        </select>
                    </div>
                    <div>
                        <label for="diet-type" class="block text-gray-700 font-medium mb-2">Régime alimentaire :</label>
                        <select id="diet-type" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="all">Tous</option>
                            <option value="vegetarian">Végétarien</option>
                            <option value="vegan">Végan</option>
                            <option value="gluten-free">Sans gluten</option>
                            <option value="lactose-free">Sans lactose</option>
                        </select>
                    </div>
                </div>

                <button id="generate-recipes" class="w-full bg-green-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-green-700 transition">
                    Générer des recettes
                </button>
            </div>

            <!-- Recipe Results -->
            <div id="recipe-results">
                <h2 class="text-2xl font-bold mb-4">Recettes suggérées (3)</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Sample Recipe Cards (similar to home page) -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Image de recette</span>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-semibold">Salade de tomates et oignons</h3>
                                <button class="text-gray-400 hover:text-yellow-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex mb-3">
                                <div class="flex items-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">10 min</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">2 portions</span>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-3 text-sm">
                                Une salade fraîche et légère à base de tomates et d'oignons, parfaite pour l'été.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Entrée</span>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Rapide</span>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Végétarien</span>
                            </div>
                            <div class="border-t pt-3">
                                <h4 class="font-medium text-sm mb-2">Ingrédients correspondants :</h4>
                                <div class="flex flex-wrap gap-1">
                                    <span class="bg-green-200 text-green-800 text-xs px-2 py-1 rounded">tomates</span>
                                    <span class="bg-green-200 text-green-800 text-xs px-2 py-1 rounded">oignons</span>
                                </div>
                            </div>
                            <button class="mt-4 w-full bg-green-600 text-white py-2 rounded font-medium hover:bg-green-700 transition">
                                Voir la recette
                            </button>
                        </div>
                    </div>

                    <!-- More recipe results would be here -->
                </div>
            </div>
        </section>

        <!-- Favorites Page -->
        <section id="favorites" class="page">
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-semibold mb-6">Vos recettes favorites</h2>
                
                <div id="no-favorites" class="text-center py-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <p class="text-lg text-gray-600 mb-2">Vous n'avez pas encore de favoris</p>
                    <p class="text-gray-500 mb-4">Explorez nos recettes et ajoutez-les à vos favoris pour les retrouver ici</p>
                    <button class="nav-link bg-green-600 text-white px-6 py-2 rounded-md font-medium hover:bg-green-700 transition" data-page="search">
                        Explorer les recettes
                    </button>
                </div>
                
                <!-- Favorite Recipes (Hidden initially, shown when user has favorites) -->
                <div id="favorite-recipes" class="hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Sample Favorite Recipe Card -->
                        <div class="bg-white rounded-lg overflow-hidden shadow-md border hover:shadow-lg transition">
                            <div class="h-40 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">Image de recette</span>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-lg font-semibold">Pasta Primavera</h3>
                                    <button class="text-yellow-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex mb-3">
                                    <div class="flex items-center mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm text-gray-600">25 min</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span class="text-sm text-gray-600">4 portions</span>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Pâtes</span>
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Légumes</span>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <button class="text-green-600 font-medium hover:text-green-800">
                                        Voir la recette
                                    </button>
                                    <button class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional favorite recipe cards would be here -->
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">QuickCook</h3>
                    <p class="text-gray-400">
                        Découvrez des recettes adaptées aux ingrédients que vous avez déjà chez vous.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Liens utiles</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">À propos</a></li>
                        <li><a href="#" class="hover:text-white">Comment ça marche</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                        <li><a href="#" class="hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Légal</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Conditions d'utilisation</a></li>
                        <li><a href="#" class="hover:text-white">Politique de confidentialité</a></li>
                        <li><a href="#" class="hover:text-white">Cookies</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 5.46a8.38 8.38 0 01-2.4.66 4.2 4.2 0 001.84-2.32 8.4 8.4 0 01-2.66 1.02 4.2 4.2 0 00-7.16 3.83 11.9 11.9 0 01-8.64-4.39 4.2 4.2 0 001.3 5.6 4.2 4.2 0 01-1.9-.53v.05a4.2 4.2 0 003.37 4.13 4.2 4.2 0 01-1.9.07 4.2 4.2 0 003.92 2.92 8.41 8.41 0 01-5.2 1.78c-.34 0-.67-.02-1-.06a11.9 11.9 0 006.45 1.89c7.73 0 11.96-6.4 11.96-11.96 0-.18 0-.36-.01-.54a8.5 8.5 0 002.09-2.17z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3V2z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2a10 10 0 110 20 10 10 0 010-20zm0 18a8 8 0 100-16 8 8 0 000 16zm-3-9a3 3 0 116 0 3 3 0 01-6 0zm3-5a5 5 0 015 5v1h-2v-1a3 3 0 10-6 0v1H7v-1a5 5 0 015-5z" />
                            </svg>
                        </a>
                    </div>
                    <div class="mt-4">
                        <h4 class="text-sm font-medium mb-2">Inscrivez-vous à notre newsletter</h4>
                        <div class="flex">
                            <input type="email" placeholder="Votre email" class="px-3 py-2 bg-gray-700 text-white rounded-l-md focus:outline-none focus:ring-2 focus:ring-green-500 flex-grow">
                            <button class="bg-green-600 text-white px-4 py-2 rounded-r-md hover:bg-green-700">
                                S'inscrire
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; 2025 QuickCook. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Login Modal (Hidden by default) -->
    <div id="login-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-8 max-w-md w-full">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Connexion</h2>
                <button id="close-login-modal" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Mot de passe</label>
                    <input type="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    <div class="flex justify-between mt-1">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember-me" class="mr-2">
                            <label for="remember-me" class="text-sm text-gray-600">Se souvenir de moi</label>
                        </div>
                        <a href="#" class="text-sm text-green-600 hover:text-green-800">Mot de passe oublié ?</a>
                    </div>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-md font-semibold hover:bg-green-700 transition">
                    Se connecter
                </button>
            </form>
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Pas encore de compte ? 
                    <a href="#" id="show-signup" class="text-green-600 font-medium hover:text-green-800">Créer un compte</a>
                </p>
                <div class="mt-4">
                    <p class="text-sm text-gray-500 mb-2">Ou connectez-vous avec</p>
                    <div class="flex justify-center space-x-4">
                        <button class="flex items-center px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50">
                            <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z" fill="#4285F4"/>
                                <path d="M12.35 15.807a3.915 3.915 0 0 1-3.59-2.633H5.667v3.5a8.922 8.922 0 0 0 6.683 3.014c2.974 0 5.494-1.337 7.024-3.501h-4.117a4.013 4.013 0 0 1-2.906 1.62z" fill="#34A853"/>
                                <path d="M5.667 10.277a3.882 3.882 0 0 1 0-2.225v-3.5H2.98a8.922 8.922 0 0 0 0 9.225l2.687-3.5z" fill="#FBBC05"/>
                                <path d="M12.35 5.245a4.88 4.88 0 0 1 3.427 1.34l2.307-2.307A8.624 8.624 0 0 0 12.35 2.052a8.922 8.922 0 0 0-6.683 3.014l2.687 3.5c.58-1.96 2.447-3.32 3.996-3.32z" fill="#EA4335"/>
                            </svg>
                            Google
                        </button>
                        <button class="flex items-center px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50">
                            <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" fill="#1877F2"/>
                                <path d="M15.893 14.89l.443-2.89h-2.773v-1.876c0-.791.387-1.562 1.63-1.562h1.26v-2.46s-1.144-.195-2.238-.195c-2.285 0-3.777 1.384-3.777 3.89V12h-2.54v2.89h2.54v6.988C10.496 21.96 11.244 22 12 22s1.504-.04 2.215-.112v-6.988h2.33z" fill="#FFFFFF"/>
                            </svg>
                            Facebook
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Signup Modal (Hidden by default) -->
    <div id="signup-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-8 max-w-md w-full">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Créer un compte</h2>
                <button id="close-signup-modal" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="firstname" class="block text-gray-700 font-medium mb-2">Prénom</label>
                        <input type="text" id="firstname" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="lastname" class="block text-gray-700 font-medium mb-2">Nom</label>
                        <input type="text" id="lastname" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="signup-email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="signup-email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div class="mb-4">
                    <label for="signup-password" class="block text-gray-700 font-medium mb-2">Mot de passe</label>
                    <input type="password" id="signup-password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div class="mb-6">
                    <label for="confirm-password" class="block text-gray-700 font-medium mb-2">Confirmer le mot de passe</label>
                    <input type="password" id="confirm-password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div class="mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="terms" class="mr-2">
                        <label for="terms" class="text-sm text-gray-600">
                            J'accepte les <a href="#" class="text-green-600 hover:text-green-800">conditions d'utilisation</a> et la <a href="#" class="text-green-600 hover:text-green-800">politique de confidentialité</a>
                        </label>
                    </div>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-md font-semibold hover:bg-green-700 transition">
                    Créer un compte
                </button>
            </form>
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Déjà un compte ? 
                    <a href="#" id="show-login" class="text-green-600 font-medium hover:text-green-800">Se connecter</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Recipe Detail Modal (Hidden by default) -->
    <div id="recipe-detail-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg max-w-4xl w-full max-h-screen overflow-y-auto">
            <div class="sticky top-0 bg-white z-10 p-4 border-b flex justify-between items-center">
                <h2 class="text-2xl font-bold">Détail de la recette</h2>
                <button id="close-recipe-modal" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <!-- Recipe content would be loaded here -->
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="md:w-1/2">
                        <div class="h-64 bg-gray-200 flex items-center justify-center mb-4">
                            <span class="text-gray-500">Image de recette</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <button class="flex items-center text-gray-700 hover:text-yellow-500 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                                Ajouter aux favoris
                            </button>
                            <button class="flex items-center text-gray-700 hover:text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                                Partager
                            </button>
                        </div>
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-2">Ingrédients</h3>
                            <ul class="list-disc pl-5 space-y-2">
                                <li>200g de pâtes</li>
                                <li>1 courgette</li>
                                <li>1 poivron rouge</li>
                                <li>1 poivron jaune</li>
                                <li>1 oignon</li>
                                <li>2 gousses d'ail</li>
                                <li>150ml de crème fraîche</li>
                                <li>50g de parmesan râpé</li>
                                <li>2 cuillères à soupe d'huile d'olive</li>
                                <li>Sel et poivre</li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:w-1/2">
                        <h3 class="text-lg font-semibold mb-2">Instructions</h3>
                        <ol class="list-decimal pl-5 space-y-4">
                            <li>
                                <p>Préparez les légumes : lavez et coupez la courgette et les poivrons en petits dés. Émincez l'oignon et hachez l'ail finement.</p>
                            </li>
                            <li>
                                <p>Dans une grande casserole, faites bouillir de l'eau salée et cuisez les pâtes selon les instructions du paquet.</p>
                            </li>
                            <li>
                                <p>Pendant ce temps, dans une grande poêle, chauffez l'huile d'olive à feu moyen. Ajoutez l'oignon et faites-le revenir jusqu'à ce qu'il devienne translucide.</p>
                            </li>
                            <li>
                                <p>Ajoutez l'ail et faites revenir pendant 30 secondes jusqu'à ce qu'il dégage son parfum.</p>
                            </li>
                            <li>
                                <p>Ajoutez les poivrons et la courgette, et faites-les cuire pendant environ 5-7 minutes
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickCook - Générez des recettes avec ce que vous avez</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        // Configuration Tailwind
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF6B6B',
                        secondary: '#4ECDC4',
                        dark: '#2A363B',
                        light: '#F7F7F7'
                    }
                }
            }
        }

        // Fonctions JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion des ingrédients
            const ingredientInput = document.getElementById('ingredient-input');
            const addIngredientBtn = document.getElementById('add-ingredient');
            const ingredientsList = document.getElementById('ingredients-list');
            const ingredientsContainer = document.getElementById('ingredients-container');
            const generateBtn = document.getElementById('generate-recipes');
            const recipeResults = document.getElementById('recipe-results');
            const loader = document.getElementById('loader');
            const languageSelect = document.getElementById('language-select');
            const loginBtn = document.getElementById('login-btn');
            const registerBtn = document.getElementById('register-btn');
            const userMenu = document.getElementById('user-menu');
            const userMenuBtn = document.getElementById('user-menu-btn');
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            // Simuler une liste d'ingrédients suggérés
            const suggestedIngredients = ['Poulet', 'Bœuf', 'Porc', 'Tomate', 'Oignon', 'Ail', 'Carotte', 'Pomme de terre', 'Riz', 'Pâtes', 'Farine', 'Œuf', 'Lait', 'Fromage', 'Poivron', 'Courgette', 'Aubergine'];
            
            // Afficher les suggestions
            const suggestionsContainer = document.getElementById('suggestions');
            suggestedIngredients.forEach(ingredient => {
                const pill = document.createElement('span');
                pill.className = 'inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 cursor-pointer hover:bg-primary hover:text-white transition';
                pill.textContent = ingredient;
                pill.addEventListener('click', function() {
                    addIngredient(ingredient);
                });
                suggestionsContainer.appendChild(pill);
            });

            // Ajouter un ingrédient
            function addIngredient(value) {
                if (!value) {
                    value = ingredientInput.value.trim();
                }
                
                if (value) {
                    const item = document.createElement('div');
                    item.className = 'flex items-center bg-white p-2 rounded-lg shadow mb-2';
                    item.innerHTML = `
                        <span class="flex-grow">${value}</span>
                        <button class="text-red-500 hover:text-red-700 delete-ingredient">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    ingredientsList.appendChild(item);
                    ingredientInput.value = '';
                    
                    // Afficher le conteneur d'ingrédients s'il est vide
                    ingredientsContainer.classList.remove('hidden');
                    
                    // Activer le bouton de génération
                    updateGenerateButton();
                    
                    // Ajouter l'événement de suppression
                    item.querySelector('.delete-ingredient').addEventListener('click', function() {
                        item.remove();
                        updateGenerateButton();
                        if (ingredientsList.children.length === 0) {
                            ingredientsContainer.classList.add('hidden');
                        }
                    });
                }
            }
            
            // Mettre à jour l'état du bouton de génération
            function updateGenerateButton() {
                if (ingredientsList.children.length > 0) {
                    generateBtn.disabled = false;
                    generateBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    generateBtn.classList.add('hover:bg-green-600');
                } else {
                    generateBtn.disabled = true;
                    generateBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    generateBtn.classList.remove('hover:bg-green-600');
                }
            }
            
            // Événement pour ajouter un ingrédient
            addIngredientBtn.addEventListener('click', function() {
                addIngredient();
            });
            
            // Ajouter un ingrédient en appuyant sur Entrée
            ingredientInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    addIngredient();
                }
            });
            
            // Générer des recettes
            generateBtn.addEventListener('click', function() {
                // Afficher le loader
                loader.classList.remove('hidden');
                recipeResults.classList.add('hidden');
                
                // Simuler une requête API (dans un projet réel, ce serait un fetch vers votre backend)
                setTimeout(function() {
                    // Cacher le loader et afficher les résultats
                    loader.classList.add('hidden');
                    recipeResults.classList.remove('hidden');
                    
                    // Dans un projet réel, vous rempliriez cette section avec les données de l'API
                    recipeResults.innerHTML = generateMockRecipes();
                    
                    // Ajouter les événements pour les favoris
                    document.querySelectorAll('.favorite-btn').forEach(btn => {
                        btn.addEventListener('click', function() {
                            this.classList.toggle('text-yellow-500');
                            this.classList.toggle('text-gray-400');
                        });
                    });
                }, 1500);
            });
            
            // Simuler des recettes (à remplacer par des données réelles de l'API)
            function generateMockRecipes() {
                const recipes = [
                    {
                        title: "Poulet rôti aux légumes",
                        time: "45 min",
                        difficulty: "Facile",
                        ingredients: ["Poulet", "Pomme de terre", "Carotte", "Oignon", "Ail", "Thym"],
                        image: "/api/placeholder/400/250"
                    },
                    {
                        title: "Pâtes à la carbonara",
                        time: "20 min",
                        difficulty: "Facile",
                        ingredients: ["Pâtes", "Lardons", "Œuf", "Parmesan", "Poivre"],
                        image: "/api/placeholder/400/250"
                    },
                    {
                        title: "Ratatouille provençale",
                        time: "60 min",
                        difficulty: "Moyen",
                        ingredients: ["Aubergine", "Courgette", "Poivron", "Tomate", "Oignon", "Ail", "Herbes de Provence"],
                        image: "/api/placeholder/400/250"
                    }
                ];
                
                let html = '<h2 class="text-2xl font-bold mb-4">Recettes suggérées</h2>';
                html += '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">';
                
                recipes.forEach(recipe => {
                    html += `
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="${recipe.image}" alt="${recipe.title}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <div class="flex justify-between items-start">
                                    <h3 class="text-xl font-bold">${recipe.title}</h3>
                                    <button class="favorite-btn text-gray-400 hover:text-yellow-500">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </div>
                                <div class="flex items-center text-sm text-gray-600 mt-2">
                                    <span class="mr-3"><i class="far fa-clock mr-1"></i> ${recipe.time}</span>
                                    <span><i class="fas fa-signal mr-1"></i> ${recipe.difficulty}</span>
                                </div>
                                <div class="mt-3">
                                    <h4 class="font-semibold mb-1">Ingrédients:</h4>
                                    <p class="text-sm text-gray-600">${recipe.ingredients.join(', ')}</p>
                                </div>
                                <button class="mt-4 w-full bg-primary hover:bg-red-500 text-white py-2 px-4 rounded transition">
                                    Voir la recette
                                </button>
                            </div>
                        </div>
                    `;
                });
                
                html += '</div>';
                return html;
            }
            
            // Toggle menu utilisateur
            userMenuBtn.addEventListener('click', function() {
                userMenu.classList.toggle('hidden');
            });
            
            // Toggle menu mobile
            mobileMenuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
            
            // Fermer les menus quand on clique ailleurs
            document.addEventListener('click', function(e) {
                if (!userMenuBtn.contains(e.target) && !userMenu.contains(e.target)) {
                    userMenu.classList.add('hidden');
                }
                
                if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="#" class="flex items-center">
                        <span class="text-primary text-2xl font-bold">Quick<span class="text-dark">Cook</span></span>
                    </a>
                </div>
                
                <!-- Navigation - Desktop -->
                <nav class="hidden md:flex items-center space-x-6">
                    <a href="#" class="text-dark hover:text-primary transition font-medium">Accueil</a>
                    <a href="#" class="text-dark hover:text-primary transition font-medium">Explorer</a>
                    <a href="#" class="text-dark hover:text-primary transition font-medium">À propos</a>
                    <a href="#" class="text-dark hover:text-primary transition font-medium">Contact</a>
                </nav>
                
                <!-- User actions - Desktop -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Language selector -->
                    <select id="language-select" class="bg-gray-100 text-gray-700 rounded px-2 py-1 text-sm">
                        <option value="fr">Français</option>
                        <option value="en">English</option>
                    </select>
                    
                    <!-- Non connecté -->
                    <div class="flex space-x-2">
                        <button id="login-btn" class="px-4 py-2 border border-primary text-primary hover:bg-primary hover:text-white rounded transition">
                            Connexion
                        </button>
                        <button id="register-btn" class="px-4 py-2 bg-primary text-white hover:bg-red-500 rounded transition">
                            Inscription
                        </button>
                    </div>
                    
                    <!-- Si connecté (ajoutez la classe 'hidden' pour cacher) -->
                    <div class="hidden relative">
                        <button id="user-menu-btn" class="flex items-center space-x-2">
                            <img src="/api/placeholder/40/40" alt="Avatar" class="w-8 h-8 rounded-full">
                            <span class="text-dark font-medium">Utilisateur</span>
                            <i class="fas fa-chevron-down text-gray-500 text-xs"></i>
                        </button>
                        
                        <!-- Menu utilisateur -->
                        <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i> Profil
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-heart mr-2"></i> Favoris
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i> Paramètres
                            </a>
                            <div class="border-t border-gray-200 my-1"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-dark hover:text-primary">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobile-menu" class="md:hidden py-4 hidden">
                <a href="#" class="block py-2 text-dark hover:text-primary">Accueil</a>
                <a href="#" class="block py-2 text-dark hover:text-primary">Explorer</a>
                <a href="#" class="block py-2 text-dark hover:text-primary">À propos</a>
                <a href="#" class="block py-2 text-dark hover:text-primary">Contact</a>
                <div class="border-t border-gray-200 my-2"></div>
                <div class="flex space-x-2 py-2">
                    <button class="w-full px-4 py-2 border border-primary text-primary hover:bg-primary hover:text-white rounded transition">
                        Connexion
                    </button>
                    <button class="w-full px-4 py-2 bg-primary text-white hover:bg-red-500 rounded transition">
                        Inscription
                    </button>
                </div>
                <div class="py-2">
                    <select class="w-full bg-gray-100 text-gray-700 rounded px-2 py-2">
                        <option value="fr">Français</option>
                        <option value="en">English</option>
                    </select>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="text-center mb-6">
                <h1 class="text-3xl md:text-4xl font-bold text-dark mb-2">Cuisinez avec ce que vous avez</h1>
                <p class="text-gray-600 text-lg">Entrez vos ingrédients et découvrez des recettes délicieuses</p>
            </div>
            
            <!-- Ingredient Input -->
            <div class="max-w-2xl mx-auto">
                <div class="flex items-center">
                    <input type="text" id="ingredient-input" class="flex-grow border border-gray-300 rounded-l-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Entrez un ingrédient (ex: poulet, tomate, riz...)">
                    <button id="add-ingredient" class="bg-primary hover:bg-red-500 text-white px-4 py-3 rounded-r-lg transition">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                
                <!-- Suggestions rapides -->
                <div class="mt-4">
                    <p class="text-sm text-gray-500 mb-2">Suggestions rapides :</p>
                    <div id="suggestions" class="flex flex-wrap"></div>
                </div>
            </div>
        </section>
        
        <!-- Ingredients List (hidden by default) -->
        <section id="ingredients-container" class="bg-white rounded-lg shadow-lg p-6 mb-8 hidden">
            <h2 class="text-xl font-bold mb-4">Vos ingrédients</h2>
            <div id="ingredients-list" class="mb-4"></div>
            <div class="flex justify-between items-center">
                <button class="text-primary hover:text-red-500 text-sm font-medium">
                    <i class="fas fa-trash mr-1"></i> Tout supprimer
                </button>
                <button id="generate-recipes" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition opacity-50 cursor-not-allowed" disabled>
                    Générer des recettes
                </button>
            </div>
        </section>
        
        <!-- Filters Section -->
        <section class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-xl font-bold mb-4">Filtres</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Type de plat -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2">Type de plat</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">Tous les types</option>
                        <option value="entree">Entrée</option>
                        <option value="plat">Plat principal</option>
                        <option value="dessert">Dessert</option>
                        <option value="snack">En-cas</option>
                    </select>
                </div>
                
                <!-- Temps de préparation -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2">Temps de préparation</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">Tous les temps</option>
                        <option value="15">15 minutes ou moins</option>
                        <option value="30">30 minutes ou moins</option>
                        <option value="60">1 heure ou moins</option>
                        <option value="more">Plus d'une heure</option>
                    </select>
                </div>
                
                <!-- Difficulté -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2">Difficulté</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">Toutes difficultés</option>
                        <option value="facile">Facile</option>
                        <option value="moyen">Moyen</option>
                        <option value="difficile">Difficile</option>
                    </select>
                </div>
                
                <!-- Régime alimentaire -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2">Régime alimentaire</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">Tous les régimes</option>
                        <option value="vegetarien">Végétarien</option>
                        <option value="vegan">Végan</option>
                        <option value="sansgluten">Sans gluten</option>
                        <option value="sanslactose">Sans lactose</option>
                    </select>
                </div>
            </div>
        </section>
        
        <!-- Loader (hidden by default) -->
        <div id="loader" class="hidden">
            <div class="flex justify-center items-center py-12">
                <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-primary"></div>
            </div>
            <p class="text-center text-gray-600">Génération de recettes en cours...</p>
        </div>
        
        <!-- Results Section (hidden by default) -->
        <section id="recipe-results" class="hidden"></section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-8 mt-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo et Description -->
                <div class="md:col-span-2">
                    <div class="text-2xl font-bold mb-4">Quick<span class="text-primary">Cook</span></div>
                    <p class="text-gray-400 mb-4">Trouvez des recettes délicieuses en fonction de vos ingrédients disponibles. Cuisinez malin, économisez du temps et évitez le gaspillage alimentaire.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-primary transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary transition"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary transition"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                
                <!-- Liens Rapides -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Liens Rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Accueil</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Explorer</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">À propos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary mt-1 mr-2"></i>
                            <span class="text-gray-400">123 Rue de la Cuisine, 75000 Paris</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-primary mr-2"></i>
                            <span class="text-gray-400">+33 1 23 45 67 89</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-primary mr-2"></i>
                            <span class="text-gray-400">contact@quickcook.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; 2025 QuickCook. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Modals -->
    <!-- Login Modal (hidden by default) -->
    <div id="login-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Connexion</h2>
                <button class="text-gray-500 hover:text-gray-700 close-modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input type="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" placeholder="votre.email@exemple.com">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Mot de passe</label>
                    <input type="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" placeholder="••••••••">
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="mr-2">
                        <label for="remember" class="text-sm text-gray-600">Se souvenir de moi</label>
                    </div>
                    <a href="#" class="text-sm text-primary hover:text-red-500">Mot de passe oublié ?</a>
                </div>
                <button type="submit" class="w-full bg-primary hover:bg-red-500 text-white py-2 px-4 rounded transition">
                    Connexion
                </button>
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        Pas encore de compte ? <a href="#" class="text-primary hover:text-red-500">S'inscrire</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Register Modal (hidden by default) -->
    <div id="register-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Inscription</h2>
                <button class="text-gray-500 hover:text-gray-700 close-modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Nom</label>
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Votre nom">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input type="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" placeholder="votre.email@exemple.com">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Mot de passe</label>
                    <input type="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" placeholder="••••••••">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Confirmer le mot de passe</label>
                    <input type="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" placeholder="••••••••">
                </div>
                <div class="flex items-center mb-4">
                    <input type="checkbox" id="terms" class="mr-2">
                    <label for="terms" class="text-sm text-gray-600">
                        J'accepte les <a href="#" class="text-primary hover:text-red-500">conditions d'utilisation</a> et la <a href="#" class="text-primary hover:text-red-500">politique de confidentialité</a>
                    </label>
                </div>
                <button type="submit" class="w-full bg-primary hover:bg-red-500 text-white py-2 px-4 rounded transition">
                    S'inscrire
                </button>
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        Déjà un compte ? <a href="#" class="text-primary hover:text-red-500">Connexion</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Recipe Details Modal (hidden by default) -->
    <div id="recipe-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-3xl">
            <div class="flex justify-between items-center mb-4">
                <h2 id="recipe-title" class="text-2xl font-bold">Poulet rôti aux légumes</h2>
                <button class="text-gray-500 hover:text-gray-700 close-modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Recipe Image -->
                <div>
                    <img id="recipe-image" src="/api/placeholder/600/400" alt="Recipe Image" class="w-full h-64 object-cover rounded-lg">
                </div>
                <!-- Recipe Details -->
                <div>
                    <div class="flex items-center space-x-4 mb-4">
                        <span class="flex items-center text-sm text-gray-600">
                            <i class="far fa-clock mr-1"></i> 45 min
                        </span>
                        <span class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-signal mr-1"></i> Facile
                        </span>
                        <button class="favorite-btn text-gray-400 hover:text-yellow-500">
                            <i class="fas fa-star"></i>
                        </button>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Ingrédients :</h3>
                    <ul id="recipe-ingredients" class="list-disc list-inside text-gray-600 mb-4">
                        <li>Poulet</li>
                        <li>Pomme de terre</li>
                        <li>Carotte</li>
                        <li>Oignon</li>
                        <li>Ail</li>
                        <li>Thym</li>
                    </ul>
                    <h3 class="text-lg font-semibold mb-2">Instructions :</h3>
                    <p id="recipe-instructions" class="text-gray-600">
                        Préchauffez votre four à 180°C. Dans un plat allant au four, disposez les légumes coupés en morceaux. Ajoutez le poulet et assaisonnez avec du sel, du poivre et du thym. Enfournez pendant 45 minutes jusqu'à ce que le poulet soit bien cuit.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour gérer les modals -->
    <script>
        // Gestion des modals
        const loginModal = document.getElementById('login-modal');
        const registerModal = document.getElementById('register-modal');
        const recipeModal = document.getElementById('recipe-modal');
        const closeModalButtons = document.querySelectorAll('.close-modal');

        // Ouvrir le modal de connexion
        document.getElementById('login-btn').addEventListener('click', function() {
            loginModal.classList.remove('hidden');
        });

        // Ouvrir le modal d'inscription
        document.getElementById('register-btn').addEventListener('click', function() {
            registerModal.classList.remove('hidden');
        });

        // Fermer les modals
        closeModalButtons.forEach(button => {
            button.addEventListener('click', function() {
                loginModal.classList.add('hidden');
                registerModal.classList.add('hidden');
                recipeModal.classList.add('hidden');
            });
        });

        // Fermer les modals en cliquant à l'extérieur
        window.addEventListener('click', function(event) {
            if (event.target === loginModal) {
                loginModal.classList.add('hidden');
            }
            if (event.target === registerModal) {
                registerModal.classList.add('hidden');
            }
            if (event.target === recipeModal) {
                recipeModal.classList.add('hidden');
            }
        });

        // Ouvrir le modal de détails de la recette
        document.addEventListener('click', function(event) {
            if (event.target.closest('.view-recipe-btn')) {
                const recipe = {
                    title: "Poulet rôti aux légumes",
                    time: "45 min",
                    difficulty: "Facile",
                    ingredients: ["Poulet", "Pomme de terre", "Carotte", "Oignon", "Ail", "Thym"],
                    instructions: "Préchauffez votre four à 180°C. Dans un plat allant au four, disposez les légumes coupés en morceaux. Ajoutez le poulet et assaisonnez avec du sel, du poivre et du thym. Enfournez pendant 45 minutes jusqu'à ce que le poulet soit bien cuit.",
                    image: "/api/placeholder/600/400"
                };
                document.getElementById('recipe-title').textContent = recipe.title;
                document.getElementById('recipe-image').src = recipe.image;
                document.getElementById('recipe-ingredients').innerHTML = recipe.ingredients.map(ing => `<li>${ing}</li>`).join('');
                document.getElementById('recipe-instructions').textContent = recipe.instructions;
                recipeModal.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>
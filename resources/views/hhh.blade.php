<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CuisineMax - Votre Univers Culinaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: rgb(255, 107, 107);
        }
        .bg-primary {
            background-color: var(--primary-color);
        }
        .text-primary {
            color: var(--primary-color);
        }
        .border-primary {
            border-color: var(--primary-color);
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navigation -->
    <header class="bg-white shadow-md fixed w-full top-0 z-50">
        <div class="container mx-auto py-4 flex justify-between items-center">
            <div class="flex items-center">
                <a href="#" class="flex items-center">
                    <span class="text-[#E76F51] text-2xl font-bold">Quick<span class="text-[#2A2A2A]">Cook</span></span>
                </a>
            </div>
            <nav>
                <ul class="flex space-x-6 items-center">
                    {{-- <li><a href="#" class="hover:text-primary transition">Recettes</a></li>
                    <li><a href="#" class="hover:text-primary transition">Chefs</a></li>
                    <li><a href="#" class="hover:text-primary transition">Cours</a></li> --}}
                    <li><button id="login-btn" class="border border-primary text-primary px-4 py-2 rounded-full hover:bg-primary/10 transition">Connexion</button></li>
                    <li><button id="register-btn" class="bg-primary text-white px-4 py-2 rounded-full hover:opacity-90 transition">Inscription</button></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Contenu Principal -->
    <main class="container mx-auto px-4 pt-24">
        <!-- Section Héroïque -->
        <section class="grid md:grid-cols-2 gap-12 mb-20">
            <div>
                <div class="bg-primary/10 text-primary px-4 py-2 rounded-full inline-block mb-4">
                    Cuisine Créative 🔥
                </div>
                <h1 class="text-5xl font-bold mb-6 text-gray-900">
                    Transformez Votre Cuisine en Atelier Artistique
                </h1>
                <p class="text-gray-700 text-xl mb-8">
                    Découvrez des recettes innovantes, des techniques uniques et une communauté passionnée de gastronomes.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="bg-primary text-white px-6 py-3 rounded-full hover:opacity-90 shadow-lg transition">
                        Explorer
                    </a>
                    <a href="#" class="border border-primary text-primary px-6 py-3 rounded-full hover:bg-primary/10 transition">
                        Nos Cours
                    </a>
                </div>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1507048331197-7d4ac70811cf?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                     alt="Cuisine créative" 
                     class="rounded-3xl shadow-2xl object-cover w-full h-[500px]">
            </div>
        </section>

        <!-- Section Recettes Populaires -->
        <section class="mb-20">
            <h2 class="text-4xl font-bold text-center mb-12">Recettes du Moment</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition">
                    <img src="https://receptovnik.cz/wp-content/uploads/6068/dokonale-testo-na-palacinky-pripravite-i-bez-mixeru-variantu-ve-sklenici-si-zamilujete-2-840x473.jpg" 
                         alt="Recette 1" 
                         class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Tarte Moderne</h3>
                        <p class="text-gray-600 mb-4">Une réinvention créative des desserts classiques.</p>
                        <a href="#" class="text-primary hover:underline">Voir la Recette</a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition">
                    <img src="https://th.bing.com/th/id/R.bcfa9028071fdab10eb0c47ddcf4eff2?rik=hzRqMdn%2b8gFvGg&pid=ImgRaw&r=0" 
                         alt="Recette 2" 
                         class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Bowl Coloré</h3>
                        <p class="text-gray-600 mb-4">Un mélange de saveurs et de couleurs fraîches.</p>
                        <a href="#" class="text-primary hover:underline">Voir la Recette</a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition">
                    <img src="https://images.unsplash.com/photo-1540420773420-3366772f4999?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                         alt="Recette 3" 
                         class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Brunch Créatif</h3>
                        <p class="text-gray-600 mb-4">Un brunch qui réinvente les petits-déjeuners.</p>
                        <a href="#" class="text-primary hover:underline">Voir la Recette</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white rounded-3xl p-12 mb-20">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold mb-10 text-center text-gray-900">
                    Nos Garanties
                </h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="text-5xl mb-4 text-primary">🔒</div>
                        <h3 class="font-bold text-xl mb-4">Satisfaction Garantie</h3>
                        <p class="text-gray-600">Remboursement si insatisfaction</p>
                    </div>
                    <div class="text-center">
                        <div class="text-5xl mb-4 text-primary">📅</div>
                        <h3 class="font-bold text-xl mb-4">Flexibilité</h3>
                        <p class="text-gray-600">Reports et annulations possibles</p>
                    </div>
                    <div class="text-center">
                        <div class="text-5xl mb-4 text-primary">🏅</div>
                        <h3 class="font-bold text-xl mb-4">Certification</h3>
                        <p class="text-gray-600">Diplôme officiel à la fin du cours</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Communauté -->
        <section class="mb-20">
            <h2 class="text-4xl font-bold text-center mb-12">Notre Communauté</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg">
                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=1780&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                         alt="Chef 1" 
                         class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
                    <h3 class="text-xl font-bold mb-2">Pierre Dupont</h3>
                    <p class="text-gray-600 mb-4">Chef Étoilé</p>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                         alt="Chef 2" 
                         class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
                    <h3 class="text-xl font-bold mb-2">Sophie Martin</h3>
                    <p class="text-gray-600 mb-4">Cheffe Pâtissière</p>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                         alt="Chef 3" 
                         class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
                    <h3 class="text-xl font-bold mb-2">Marc Leblanc</h3>
                    <p class="text-gray-600 mb-4">Chef Végétarien</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Pied de Page -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-xl font-bold mb-4 text-primary">CuisineMax</h4>
                    <p class="text-gray-400">Votre destination ultime pour l'inspiration culinaire.</p>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Liens Rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-primary">Recettes</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary">Cours</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary">Chefs</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Communauté</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-primary">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary">Forum</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary">Newsletter</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Contact</h4>
                    <p class="text-gray-400">contact@cuisinemax.com</p>
                    <p class="text-gray-400">+33 1 23 45 67 89</p>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800 text-center">
                <p class="text-gray-400">&copy; 2024 CuisineMax. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
{{-- login modal --}}
    <div id="login-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Connexion</h2>
                <button class="text-gray-500 hover:text-gray-700 close-modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST" action="{{login.post}}">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input type="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" placeholder="votre.email@exemple.com">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Mot de passe</label>
                    <input type="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" placeholder="••••••••">
                </div>
                <button type="submit" class="w-full bg-primary hover:bg-red-500 text-white py-2 px-4 rounded transition">
                    Connexion
                </button>
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        Pas encore de compte ? <a class="text-primary hover:text-red-500 switch-registre">S'inscrire</a>
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
            <form method="POST" action="{{registre.post}}">
                @csrf
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
                <button type="submit" class="w-full bg-primary hover:bg-red-500 text-white py-2 px-4 rounded transition">
                    S'inscrire
                </button>
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        Déjà un compte ? <a class="text-primary hover:text-red-500 switch-login">Connexion</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
         const loginModal = document.getElementById('login-modal');
         const registerModal = document.getElementById('register-modal');
         const closeModalButtons = document.querySelectorAll('.close-modal');
         const switchRegistre = document.querySelector('.switch-registre');
         const switchLogin = document.querySelector('.switch-login');

        document.getElementById('login-btn').addEventListener('click', function() {
            loginModal.classList.remove('hidden');
        });

        document.getElementById('register-btn').addEventListener('click', function() {
            registerModal.classList.remove('hidden');
        });

        closeModalButtons.forEach(button => {
            button.addEventListener('click', function() {
                loginModal.classList.add('hidden');
                registerModal.classList.add('hidden');
            });
        });

        switchRegistre.addEventListener('click',function(){
            loginModal.classList.add('hidden');
            registerModal.classList.remove('hidden');
        })

        switchLogin.addEventListener('click',function(){
            registerModal.classList.add('hidden');
            loginModal.classList.remove('hidden');
        })
    </script>
</body>
</html>
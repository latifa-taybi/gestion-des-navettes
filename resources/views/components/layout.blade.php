<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Gestion des Navettes - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-800 text-white">
            <div class="p-4 border-b border-slate-700">
                <h2 class="text-xl font-bold">Admin Dashboard</h2>
                <p class="text-sm text-slate-400">Gestion des Navettes</p>
            </div>
            <nav class="p-2">
                <ul>
                    <li class="mb-1">
                        <a href="/statistique" class="flex items-center p-2 rounded ">
                            <i class="fas fa-tachometer-alt mr-3"></i> Statistiques
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="/role" class="flex items-center p-2 rounded  ">
                            <i class="fas fa-user-tag mr-3"></i> Rôles
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="flex items-center p-2 rounded ">
                            <i class="fas fa-users mr-3"></i> Utilisateurs
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="/tags" class="flex items-center p-2 rounded ">
                            <i class="fas fa-tags mr-3"></i> Tags
                        </a>
                    </li>
                    <li class="mt-4 border-t border-slate-700 pt-4">
                        <a href="#" class="flex items-center p-2 rounded ">
                            <i class="fas fa-sign-out-alt mr-3"></i> Déconnexion
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        {{ $slot }}

        <script>
            const links = document.querySelectorAll("aside nav a");
            const currentURL = window.location.href; 

            links.forEach(link => {
                if (link.href === currentURL) {
                    link.classList.add("bg-blue-600");
                }else{
                    link.classList.add("hover:bg-slate-700");
                }
            });
        </script>
</body>
</html>
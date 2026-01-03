<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaBagnole | Gestion Catégories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 flex h-screen font-sans">

    <aside class="w-64 bg-emerald-900 text-white flex flex-col shadow-xl">
        <div class="p-8 text-center">
            <h1 class="text-2xl font-black italic tracking-tighter">MA<span class="text-emerald-400">BAGNOLE</span></h1>
            <p class="text-[10px] text-emerald-400 uppercase tracking-[0.2em] font-bold mt-1">Admin Panel</p>
        </div>
        <nav class="flex-1 px-4 space-y-1">
            <a href="dashboard.php" class="flex items-center p-3 text-emerald-100 hover:bg-emerald-800 rounded-xl transition-all">
                <i class="fas fa-chart-pie mr-3 w-5"></i> Dashboard
            </a>
            <a href="vehicles.php" class="flex items-center p-3 text-emerald-100 hover:bg-emerald-800 rounded-xl transition-all">
                <i class="fas fa-car mr-3 w-5"></i> Véhicules
            </a>
            <a href="categories.php" class="flex items-center p-3 bg-emerald-700 text-white rounded-xl shadow-inner">
                <i class="fas fa-tags mr-3 w-5"></i> Catégories
            </a>
            <a href="reservations.php" class="flex items-center p-3 text-emerald-100 hover:bg-emerald-800 rounded-xl transition-all">
                <i class="fas fa-calendar-check mr-3 w-5"></i> Réservations
            </a>
            <a href="avis.php" class="flex items-center p-3 text-emerald-100 hover:bg-emerald-800 rounded-xl transition-all">
                <i class="fas fa-comment-slash mr-3 w-5"></i> Avis
            </a>
        </nav>
    </aside>

    <main class="flex-1 overflow-y-auto p-10">
        
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Gestion des Catégories</h2>
                <p class="text-gray-500">Organisez votre flotte par types de véhicules.</p>
            </div>
            <div class="flex gap-4">
                <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <span class="block text-2xl font-black text-emerald-600">08</span>
                    <span class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Total Catégories</span>
                </div>
            </div>
        </div>

        <div class="flex gap-4 mb-6">
            <button onclick="openModal('single')" class="bg-white border-2 border-emerald-600 text-emerald-600 px-5 py-2.5 rounded-xl font-bold hover:bg-emerald-50 transition-all text-sm">
                + Ajouter une catégorie
            </button>
            <button onclick="openModal('mass')" class="bg-emerald-600 text-white px-5 py-2.5 rounded-xl font-bold hover:bg-emerald-700 shadow-lg shadow-emerald-200 transition-all text-sm">
                <i class="fas fa-layer-group mr-2"></i> Ajout en masse
            </button>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider">Nom de la catégorie</th>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider text-center">Véhicules liés</th>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider">Dernière mise à jour</th>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="hover:bg-emerald-50/30 transition-colors">
                        <td class="px-8 py-5">
                            <span class="font-bold text-gray-700 block">Économique</span>
                            <span class="text-xs text-gray-400 italic">Voitures citadines à faible consommation</span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">12 Voitures</span>
                        </td>
                        <td class="px-8 py-5 text-sm text-gray-500">Il y a 2 jours</td>
                        <td class="px-8 py-5 text-right space-x-3">
                            <button class="text-gray-400 hover:text-emerald-600 transition-colors"><i class="fas fa-pen"></i></button>
                            <button class="text-gray-400 hover:text-red-600 transition-colors"><i class="fas fa-trash-can"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <div id="massModal" class="hidden fixed inset-0 bg-emerald-950/40 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Ajout en masse</h3>
                    <button onclick="closeModal('mass')" class="text-gray-400 hover:text-gray-600"><i class="fas fa-times"></i></button>
                </div>
                <form action="../controllers/category_controller.php" method="POST">
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Liste des catégories (une par ligne)</label>
                    <textarea name="categories_list" rows="6" 
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 outline-none transition-all placeholder:text-gray-300"
                        placeholder="Luxe&#10;Utilitaire&#10;SUV 4x4..."></textarea>
                    
                    <div class="mt-6 flex gap-3">
                        <button type="button" onclick="closeModal('mass')" class="flex-1 py-3 bg-gray-100 text-gray-600 font-bold rounded-xl hover:bg-gray-200 transition-all">Annuler</button>
                        <button type="submit" name="mass_add" class="flex-1 py-3 bg-emerald-600 text-white font-bold rounded-xl hover:bg-emerald-700 shadow-lg shadow-emerald-200 transition-all">
                            Enregistrer la liste
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(type) {
            if(type === 'mass') document.getElementById('massModal').classList.remove('hidden');
        }
        function closeModal(type) {
            if(type === 'mass') document.getElementById('massModal').classList.add('hidden');
        }
    </script>
</body>
</html>
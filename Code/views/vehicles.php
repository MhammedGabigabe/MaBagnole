<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaBagnole | Gestion Véhicules</title>
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
            <a href="vehicles.php" class="flex items-center p-3 bg-emerald-700 text-white rounded-xl shadow-inner transition-all">
                <i class="fas fa-car mr-3 w-5"></i> Véhicules
            </a>
            <a href="categories.php" class="flex items-center p-3 text-emerald-100 hover:bg-emerald-800 rounded-xl transition-all">
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
                <h2 class="text-3xl font-bold text-gray-800">Parc Automobile</h2>
                <p class="text-gray-500">Gérez vos véhicules et leur état de disponibilité.</p>
            </div>
            
            <div class="flex gap-4">
                <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <span class="block text-2xl font-black text-emerald-600">42</span>
                    <span class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Actifs</span>
                </div>
                <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <span class="block text-2xl font-black text-amber-500">05</span>
                    <span class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">En Réparation</span>
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center mb-6">
            <div class="flex gap-4">
                <button onclick="openModal('massVehicle')" class="bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-emerald-700 shadow-lg shadow-emerald-200 transition-all flex items-center">
                    <i class="fas fa-file-import mr-2"></i> Import en masse (CSV/Liste)
                </button>
                <button class="bg-white border border-gray-200 text-gray-700 px-6 py-3 rounded-xl font-bold hover:bg-gray-50 transition-all flex items-center">
                    <i class="fas fa-plus mr-2 text-emerald-600"></i> Nouveau véhicule
                </button>
            </div>
            
            <div class="relative">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Rechercher un modèle..." class="pl-12 pr-4 py-3 bg-white border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-emerald-500 w-64 transition-all">
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider">Véhicule</th>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider">Catégorie</th>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider">Prix/Jour</th>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider">Statut</th>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="hover:bg-emerald-50/30 transition-colors group">
                        <td class="px-8 py-5 flex items-center">
                            <div class="w-12 h-12 rounded-lg bg-gray-100 mr-4 flex items-center justify-center overflow-hidden">
                                <i class="fas fa-car text-gray-400 text-xl"></i>
                            </div>
                            <div>
                                <span class="font-bold text-gray-800 block">Range Rover Evoque</span>
                                <span class="text-xs text-gray-400">Immatriculation: 12-A-5678</span>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="text-sm font-medium text-gray-600 bg-gray-100 px-3 py-1 rounded-lg italic">Luxe & SUV</span>
                        </td>
                        <td class="px-8 py-5 font-black text-emerald-700">
                            950 DH
                        </td>
                        <td class="px-8 py-5">
                            <span class="flex items-center text-xs font-bold text-emerald-600">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2 animate-pulse"></span> Disponible
                            </span>
                        </td>
                        <td class="px-8 py-5 text-right space-x-2">
                            <button class="p-2 text-gray-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all"><i class="fas fa-edit"></i></button>
                            <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all"><i class="fas fa-trash-can"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <div id="massVehicleModal" class="hidden fixed inset-0 bg-emerald-950/40 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl overflow-hidden transform transition-all">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">Ajout Multiple de Véhicules</h3>
                        <p class="text-sm text-gray-400">Format recommandé : Modèle | Prix | Catégorie | Immatriculation</p>
                    </div>
                    <button onclick="closeModal('massVehicle')" class="text-gray-400 hover:text-gray-600"><i class="fas fa-times"></i></button>
                </div>
                
                <form action="../controllers/vehicle_controller.php" method="POST">
                    <textarea name="vehicles_data" rows="8" 
                        class="w-full px-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 outline-none transition-all font-mono text-sm"
                        placeholder="Dacia Logan | 250 | Économique | 1234-B-7&#10;Golf 8 | 500 | Compacte | 5678-A-15..."></textarea>
                    
                    <div class="mt-6 flex gap-4">
                        <button type="button" onclick="closeModal('massVehicle')" class="flex-1 py-4 bg-gray-100 text-gray-600 font-bold rounded-2xl hover:bg-gray-200 transition-all">
                            Annuler
                        </button>
                        <button type="submit" name="mass_add_vehicles" class="flex-1 py-4 bg-emerald-600 text-white font-bold rounded-2xl hover:bg-emerald-700 shadow-lg shadow-emerald-200 transition-all">
                            Lancer l'importation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id + 'Modal').classList.remove('hidden');
        }
        function closeModal(id) {
            document.getElementById(id + 'Modal').classList.add('hidden');
        }
    </script>
</body>
</html>
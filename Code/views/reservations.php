<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaBagnole | Gestion Réservations</title>
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
            <a href="categories.php" class="flex items-center p-3 text-emerald-100 hover:bg-emerald-800 rounded-xl transition-all">
                <i class="fas fa-tags mr-3 w-5"></i> Catégories
            </a>
            <a href="reservations.php" class="flex items-center p-3 bg-emerald-700 text-white rounded-xl shadow-inner transition-all">
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
                <h2 class="text-3xl font-bold text-gray-800">Suivi des Réservations</h2>
                <p class="text-gray-500">Approuvez ou refusez les demandes de location en temps réel.</p>
            </div>
            
            <div class="flex gap-4">
                <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <span class="block text-2xl font-black text-amber-500">12</span>
                    <span class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">En Attente</span>
                </div>
                <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <span class="block text-2xl font-black text-blue-500">85</span>
                    <span class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Ce mois-ci</span>
                </div>
            </div>
        </div>

        <div class="flex gap-4 mb-6">
            <button class="px-5 py-2 bg-emerald-600 text-white rounded-lg font-bold text-sm">Toutes</button>
            <button class="px-5 py-2 bg-white text-gray-500 border border-gray-200 rounded-lg font-bold text-sm hover:bg-gray-50">En attente</button>
            <button class="px-5 py-2 bg-white text-gray-500 border border-gray-200 rounded-lg font-bold text-sm hover:bg-gray-50">Confirmées</button>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider">Client & Véhicule</th>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider">Dates</th>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider text-center">Statut</th>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider">Total</th>
                        <th class="px-8 py-5 text-[11px] font-black text-gray-400 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-8 py-5">
                            <span class="font-bold text-gray-800 block">Ahmed Alaoui</span>
                            <span class="text-xs text-emerald-600 font-medium">Dacia Logan (2024)</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="text-xs text-gray-600">
                                <p><i class="far fa-calendar-plus mr-1 text-gray-400"></i> 15 Jan. 2026</p>
                                <p><i class="far fa-calendar-minus mr-1 text-gray-400"></i> 18 Jan. 2026</p>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter">En attente</span>
                        </td>
                        <td class="px-8 py-5 font-bold text-gray-700">750 DH</td>
                        <td class="px-8 py-5 text-right space-x-2">
                            <button title="Accepter" class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all">
                                <i class="fas fa-check"></i>
                            </button>
                            <button title="Refuser" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all">
                                <i class="fas fa-times"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-8 py-5">
                            <span class="font-bold text-gray-800 block">Sara Idrissi</span>
                            <span class="text-xs text-emerald-600 font-medium">Range Rover Evoque</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="text-xs text-gray-600">
                                <p><i class="far fa-calendar-check mr-1 text-emerald-400"></i> 02 Jan. 2026</p>
                                <p><i class="far fa-calendar-minus mr-1 text-gray-400"></i> 05 Jan. 2026</p>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter">Confirmée</span>
                        </td>
                        <td class="px-8 py-5 font-bold text-gray-700">2,850 DH</td>
                        <td class="px-8 py-5 text-right">
                            <button class="text-gray-400 hover:text-gray-600 px-2"><i class="fas fa-ellipsis-v"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
<?php
session_start();
require_once "../controllers/categorie.php";
require_once "../controllers/vehicule.php"; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaBagnole | Explorer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen">

    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center sticky top-0 z-50">
        <h1 class="text-2xl font-black text-emerald-700 italic">MA<span class="text-gray-800">BAGNOLE</span></h1>
        <div class="flex items-center gap-6">
            <span class="text-gray-600 hidden md:block">Bienvenue, <strong class="text-emerald-600"><?= $_SESSION['nom'] ?? 'Client'; ?></strong></span>

            <!-- Bouton Mes Réservations -->
            <a href="reservationsClient.php" class="flex items-center gap-2 bg-emerald-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-emerald-700 transition-colors">
                <i class="fa-solid fa-list"></i> Mes Réservations
            </a>

            <a href="../controllers/logout.php" class="flex items-center gap-2 bg-red-50 text-red-600 px-4 py-2 rounded-lg font-bold hover:bg-red-100 transition-colors">
                <i class="fa-solid fa-right-from-bracket"></i> Déconnexion
            </a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <header class="mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Nos Catégories</h2>
        </header>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                <?php foreach ($listeCategories as $cat){ ?>
                <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all border border-gray-100">
                    <div class="h-32 overflow-hidden">
                        <img src="<?= $cat['image'] ?>" class="w-full h-full object-cover group-hover:scale-110 transition-duration-500">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-bold text-gray-800"><?= $cat['nom'] ?></h3>
                        <button
                            type="button"
                            onclick="filtrerCategorie(<?= $cat['id_categorie'] ?>)"
                            class="text-xs text-emerald-600 font-bold hover:underline">
                            Voir cette catégorie
                        </button>
                    </div>
                </div>
                <?php } ?>
            </div>

        <hr class="border-gray-200 mb-12">

        <header id="vehicules" class="mb-8 flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900">Véhicules disponibles</h2>
                <p class="text-gray-500">Cliquez sur un véhicule pour voir les détails.</p>
            </div>
            <div class="relative">
                <input type="text" placeholder="Modèle, marque..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none w-64">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-gray-400"></i>
            </div>
        </header>
        <form method="POST" action="detailsVehicule.php">
            <div id="vehicules-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <?php 
                foreach ($listeVehicules as $vehicule){ 
                ?>
                    <button name="deatilsVehicule" type="submit" value="<?= $vehicule['id_vehicule'] ?>" class="group bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all">
                        <div class="relative h-60">
                            <img src="<?= $vehicule['image'] ?>" class="w-full h-full object-cover">
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg shadow-sm">
                                <span class="text-emerald-700 font-bold"><?= $vehicule['prix_jour'] ?>DH</span><span class="text-gray-500 text-xs">/jour</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-bold text-gray-800"><?= $vehicule['marque']." ".$vehicule['modele'] ?></h3>
                                <?php if($vehicule['disponibilite']){ ?>
                                    <span class="text-[10px] bg-emerald-100 text-emerald-700 font-bold px-2 py-1 rounded-md uppercase">Disponible</span>
                                <?php }else{ ?>
                                    <span class="text-[10px] bg-red-100 text-red-700 font-bold px-2 py-1 rounded-md uppercase">Loué</span>
                                <?php } ?>
                            </div>
                            <div class="mt-4 flex items-center text-emerald-600 font-bold text-sm">
                                Voir les détails <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform"></i>
                            </div>
                        </div>
                    </button>
                <?php } ?>
            </div>
        </form>
    </main>
    <script>
        function filtrerCategorie(idCategorie) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../controllers/vehiculeAjax.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById("vehicules-container").innerHTML = xhr.responseText;
                    document.getElementById("vehicules").scrollIntoView({ behavior: "smooth" });
                }
            };

            xhr.send("idCategorie=" + idCategorie);
        }
    </script>

</body>
</html>
<?php

$main = "../index.php";
$types = "./abilities_types.index.php";
$abilities = "./abilities.index.php";
$logo = "../assets/logo.png";
$dashboard = "./dashboard.php";
$warriorsPage = "./warrior_ability.index.php";
include "../templates/header.php";
include '../data/database.php';

$db = new Database();
$warriorsCount = $db->countWarriors();
$abilitiesCount = $db->countAbilities();
?>

<body>
    <section class="container d-flex flex-column min-vh-100">
        <main class="flex-grow-1">
            <section class="container p-3 row gap-5">
                <!-- Tu contenido aquí -->
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Guerreros registrados</h5>
                        <p class="card-subtitle mb-2 text-body-secondary text-center fs-1"><?= $warriorsCount ?></p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Habilidades creadas</h5>
                        <p class="card-subtitle mb-2 text-body-secondary text-center fs-1"><?= $abilitiesCount ?></p>
                    </div>
                </div>
            </section>
        </main>
        <footer class="text-center">
            <!-- Tu footer aquí -->
        </footer>
    </section>


    <?php include "../templates/footer.php"; ?>
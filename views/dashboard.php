<?php

$main = "../index.php";
$types = "./abilities_types.index.php";
$abilities = "./abilities.index.php";
$logo = "../assets/logo.png";
$dashboard = "./dashboard.php";
$warriorsPage = "./warrior_ability.index.php";
include "../templates/header.php";
include '../data/database.php';
include '../helpers/analyzer.php';

$db = new Database();
$warriorsCount = $db->countWarriors();
$abilitiesCount = $db->countAbilities();
$analyzer = new WarriorAnalytics($db);
$averageAbilitiesPower = $analyzer->getAveragePowerLevelOfAbilities();
$abilitiesData = $analyzer->getMostAndLeastPowerfulAbilities();
$weakerAbility = $abilitiesData["habilidad_menos_poderosa"];
$strongestAbility = $abilitiesData["habilidad_mas_poderosa"];
$weakerAbilityName = $abilitiesData["habilidad_menos_poderosa_nombre"];
$strongestAbilityName = $abilitiesData["habilidad_mas_poderosa_nombre"];
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
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edad promedio de los guerreros</h5>
                        <p class="card-subtitle mb-2 text-body-secondary text-center fs-1"><?= number_format($analyzer->getAverageAgeOfWarriors(), 2) ?> años</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Nivel de poder promedio de las habilidades: </h5>
                        <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar text-bg-warning" style="width: <?= $averageAbilitiesPower ?>%"><?= number_format($averageAbilitiesPower) ?> / 100</div>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Habilidad más débil: </h5>
                        <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar text-bg-danger" style="width: <?= $weakerAbility ?>%"><?= number_format($weakerAbility) ?> / 100</div>
                        </div>
                        <h6 class="card-title text-center"><?= $weakerAbilityName ?></h5>
                            <h6 class="card-title text-center">Puntuación: <?= $weakerAbility ?></h5>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Habilidad más fuerte: </h5>
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar text-bg-success" style="width: <?= $strongestAbility ?>%"><?= number_format($strongestAbility) ?> / 100</div>
                        </div>
                        <h6 class="card-title text-center"><?= $strongestAbilityName ?></h5>
                            <h6 class="card-title text-center">Puntuación: <?= $strongestAbility ?></h5>
                    </div>
                </div>
            </section>
        </main>
    </section>


    <?php include "../templates/footer.php"; ?>
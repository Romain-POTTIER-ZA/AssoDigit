<?php

// Il est crucial de démarrer la session au tout début
session_start();

// On vérifie si l'utilisateur est connecté en regardant si une variable de session existe
$userIsLoggedIn = isset($_SESSION['user_id']);
$currentUser = []; // On initialise un tableau pour les infos de l'utilisateur

$currentUser = [
        'id' => $_SESSION['user_id'],
        'email' => $_SESSION['user_email'] ?? 'N/A',
        'firstname' => $_SESSION['user_firstname'] ?? 'Asso',
        'lastname' => $_SESSION['user_lastname'] ?? 'Digit',
    ];

// --- DÉBUT DE LA LOGIQUE DE ROUTAGE ---

// 1. Définir la liste blanche des pages autorisées
$pagesAutorisees = ['home', 'licencies', 'payments'];

// 2. Récupérer la page demandée ou définir la page par défaut
$pageDemandee = $_GET['page'] ?? 'home';

// 3. Déterminer le chemin du fichier à inclure
if (in_array($pageDemandee, $pagesAutorisees)) {
    $fichierAInclure = 'pages/' . $pageDemandee . '.php';

    // Sécurité supplémentaire : on vérifie que le fichier existe réellement
    if (!file_exists($fichierAInclure)) {
        // Si le fichier n'est pas trouvé, on bascule sur la page 404
        http_response_code(404);
        $fichierAInclure = 'pages/404.php';
    }
} else {
    // Si la page n'est pas dans la liste blanche, c'est une erreur 404
    http_response_code(404);
    $fichierAInclure = 'pages/404.php';
}
// --- FIN DE LA LOGIQUE DE ROUTAGE ---
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/AD_logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined">
    <link rel="stylesheet" href="style/main.css">
    <title>AssoDigit</title>
</head>
<body class="<?= $userIsLoggedIn ? 'app-layout' : 'login-layout' ?>">
    
<nav>
    <?php include_once './modules/nav/navBar.php';?>
</nav>
<aside>
    <?php include_once './modules/nav/navAside.php';?>
</aside>
<main>
    <?php include($fichierAInclure);  ?>
</main>
<footer></footer>

</body>
</html>
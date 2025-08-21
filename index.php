<?php
// Démarrer la session est la PREMIÈRE chose à faire.
session_start();

// --- TRAITEMENT DU FORMULAIRE DE CONNEXION ---
$errorMessage = '';
// On vérifie que le formulaire de connexion a bien été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_form'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Mettez ici votre logique de vérification (base de données, etc.)
    // **Exemple à remplacer par votre propre logique sécurisée**
    $validUser = 'admin@assodigit.com';
    $validPassword = 'password123';

    if ($email === $validUser && $password === $validPassword) {
        // Les identifiants sont corrects, on stocke les infos en session
        $_SESSION['user_id'] = 1; 
        $_SESSION['user_email'] = $email;
        $_SESSION['user_firstname'] = 'Asso'; // Remplacez par les vraies données
        $_SESSION['user_lastname'] = 'Digit';  // Remplacez par les vraies données

        // On redirige vers la page d'accueil. Le script s'arrête ici.
        header('Location: dashboard.php?page=home');
        exit();
    } else {
        // Identifiants incorrects
        $errorMessage = 'Email ou mot de passe incorrect.';
    }
}

// --- LOGIQUE D'AFFICHAGE ET DE ROUTAGE ---
$userIsLoggedIn = isset($_SESSION['user_id']);
$currentUser = [];

if ($userIsLoggedIn) {
    // ... (le reste de votre logique de routage pour utilisateur connecté reste ici)
    $currentUser = [
        'id' => $_SESSION['user_id'],
        'email' => $_SESSION['user_email'] ?? 'N/A',
        'firstname' => $_SESSION['user_firstname'] ?? 'N/A',
        'lastname' => $_SESSION['user_lastname'] ?? 'N/A',
    ];
    $pagesAutorisees = ['home', 'licencies', 'payments', 'logout'];
    $pageDemandee = $_GET['page'] ?? 'home';
    if (in_array($pageDemandee, $pagesAutorisees)) {
        $fichierAInclure = 'pages/' . $pageDemandee . '.php';
        if (!file_exists($fichierAInclure)) {
            $fichierAInclure = 'pages/404.php';
        }
    } else {
        $fichierAInclure = 'pages/404.php';
    }
} else {
    // Si non connecté, on affiche toujours le formulaire de connexion
    $fichierAInclure = 'pages/connexion/login.php';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined">
    <link rel="stylesheet" href="style/main.css">
    <title>AssoDigit</title>
</head>
<body class="<?= $userIsLoggedIn ? 'app-layout' : 'login-layout' ?>">
    
<?php if ($userIsLoggedIn): ?>
    <!-- Structure de l'application si connecté -->
    <nav>
        <?php include_once './modules/nav/navBar.php'; ?>
    </nav>
    <aside>
        <?php include_once './modules/nav/navAside.php'; ?>
    </aside>
    <main>
        <?php include($fichierAInclure); ?>
    </main>
    <footer></footer>
<?php else: ?>
    <!-- Affichage de la page de connexion si non connecté -->
    <?php include($fichierAInclure); ?>
<?php endif; ?>

</body>
</html>

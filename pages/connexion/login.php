<?php
// --- TRAITEMENT DU FORMULAIRE DE CONNEXION ---
$errorMessage = '';

// On vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Mettez ici votre logique de vérification (ex: avec une base de données)
    // Pour l'exemple, on utilise des identifiants en dur.
    // **NE JAMAIS FAIRE ÇA EN PRODUCTION !**
    $validUser = 'admin@assodigit.com';
    $validPassword = 'password123';

    if ($email === $validUser && $password === $validPassword) {
        // Les identifiants sont corrects
        $_SESSION['user_id'] = 1; // On stocke un identifiant en session
        $_SESSION['user_email'] = $email;

        // On redirige vers la page d'accueil de l'application
        header('Location:dashboard.php?page=home');
        exit(); // Toujours terminer le script après une redirection
    } else {
        // Identifiants incorrects
        $errorMessage = 'Email ou mot de passe incorrect.';
    }
}
?>

<div class="login-container">
    <div class="login-box">
        <div class="login-logo">
            <img src="./img/AD_logo.jpeg" width="100px" alt="">
            <h2>AssoDigit</h2>
        </div>
        
        <form method="POST" action="index.php">
            <p class="login-title">Connectez-vous à votre compte</p>
            
            <?php if ($errorMessage): ?>
                <p class="error-message"><?= htmlspecialchars($errorMessage) ?></p>
            <?php endif; ?>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="login-button">Connexion</button>
        </form>
    </div>
</div>

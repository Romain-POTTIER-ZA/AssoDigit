<div class="navbar-container">
    <div class="welcome-message">
        <!-- On affiche le prénom de l'utilisateur qui est dans la variable $currentUser -->
        <h2>Bonjour, <?= htmlspecialchars($currentUser['firstname']) ?> !</h2>
        <p>Ravi de vous revoir sur votre tableau de bord.</p>
    </div>
    <div class="user-actions">
        <div class="user-info">
            <span class="user-name"><?= htmlspecialchars($currentUser['firstname'] . ' ' . $currentUser['lastname']) ?></span>
            <span class="user-email"><?= htmlspecialchars($currentUser['email']) ?></span>
        </div>
        <a href="pages/connexion/logout.php" class="logout-button" title="Déconnexion">
            <span class="material-symbols-outlined">logout</span>
        </a>
    </div>
</div>
<div class="logo">
        <img src="./img/AD_logo.jpeg" width="80px" alt="">
    </div>
    <ul class="menu">
        <!-- On ajoute la classe 'active' dynamiquement avec PHP -->
        <li>
            <a href="dashboard.php?page=home" class="<?= ($pageDemandee == 'home') ? 'active' : '' ?>">
                <span class="material-symbols-outlined">home</span>
                <p>Accueil</p>
            </a>
        </li>
        <li>
            <a href="dashboard.php?page=licencies" class="<?= ($pageDemandee == 'licencies') ? 'active' : '' ?>">
                <span class="material-symbols-outlined">groups</span>
            <p>Licenciés</p>
        </a>
    </li>
        <li><a href="dashboard.php?page=payments" class="<?= ($pageDemandee == 'payments') ? 'active' : '' ?>">
            <span class="material-symbols-outlined">request_quote</span>
        <p>Paiements</p></a></li>
        <li><a href="dashboard.php?page=settings" class="<?= ($pageDemandee == 'settings') ? 'active' : '' ?>">
            <span class="material-symbols-outlined">settings</span>
        <p>Paramètres</p>
        </a></li>
    </ul>

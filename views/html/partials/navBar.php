<style>
    <?php require_once __DIR__ . '/../../css/mainCSS.css';
    require_once __DIR__ . '/../../css/navBar.css';
    require_once __DIR__ . '/../../css/form.css';
    require_once __DIR__ . '/../../css/404page.css'; ?>
</style>
<nav>
    <div class="left">
        <a href="/Redovalnica/" class="logo-link"><span class="logo">E-redovalnica</span></a>
    </div>
    <div class="middle">
        <ul>
            <li><a href="/Redovalnica/" class="nav-link">Domov</a></li>
            <?php if (isset($_SESSION['ime'])): ?>
                <li><a href="/Redovalnica/ocene/" class="nav-link">Ocene</a></li>
            <?php endif; ?>
            <li><a href="/Redovalnica/urnik/" class="nav-link">Urnik</a></li>
            <?php if (isset($_SESSION['vloga']) && $_SESSION['vloga'] === 'adm'): ?>
                <li><a href="#" class="nav-link">Administracija</a>
                    <ul class="dropdown">
                        <li><a href="/Redovalnica/registracijaDijaka/">Registracija dijaka</a></li>
                        <li><a href="/Redovalnica/registracijaUcitelja/">Registracija učitelja</a></li>
                        <li><a href="/Redovalnica/registrirajRazred/">Registracija razreda</a></li>
                        <li><a href="/Redovalnica/registrirajPredmet/">Registracija predmeta</a></li>
                        <li><a href="/Redovalnica/registrirajUci/">Registracija uči</a></li>
                        <li><a href="/Redovalnica/registrirajUrnik/">Registracija urnika</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <li><a href="/Redovalnica/kontakt/" class="nav-link">Kontakt</a></li>
        </ul>
    </div>
    <div class="right">
        <a href="/Redovalnica/prijava" class="user-profile-link">
            <div class="user-profile">
                <?php
                if (isset($_SESSION['ime'])) {
                    $controller = new Controllers\UporabniskiProfil();
                    echo '<img src="' . $controller->getPictureDir() . '" alt="User profile picture"> ';
                }
                ?>
                <span class="username"><?php
                    if (isset($_SESSION['ime'])) {
                        echo $_SESSION['ime'] . ' ' . $_SESSION['priimek'];
                    } else {
                        echo "Prijavi se";
                    }
                    ?></span>
            </div>
        </a>
    </div>
</nav>
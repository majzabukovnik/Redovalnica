<style>
    <?php require_once __DIR__ . '/../../css/mainCSS.css';
    require_once __DIR__ . '/../../css/navBar.css';
    require_once __DIR__ . '/../../css/form.css';
    require_once __DIR__ . '/../../css/404page.css'; ?>
</style>
<nav>
    <div class="left">
        <a href="/Redovalnica/" class="logo-link"><span class="logo">Redovalnica</span></a>
    </div>
    <div class="middle">
        <a href="/Redovalnica/" class="nav-link">Domov</a>
        <a href="/Redovalnica/ocene" class="nav-link">Ocene</a>
        <a href="/Redovalnica/izostanki" class="nav-link">Izostanki</a>
        <a href="/Redovalnica/kontakt" class="nav-link">Kontakt</a>
    </div>
    <div class="right">
        <a href="/Redovalnica/prijava" class="user-profile-link">
            <div class="user-profile">
                <?php
                if(isset($_SESSION['ime'])){
                    echo '<img src="../data/systemImages/profile.png" alt="User profile picture"> ';
                }
                ?>
                <span class="username"><?php
                    if(isset($_SESSION['ime'])){
                        echo $_SESSION['ime'] . ' ' . $_SESSION['priimek'];
                    }
                    else{
                        echo "Prijavi se";
                    }
                     ?></span>
            </div>
        </a>
    </div>
</nav>

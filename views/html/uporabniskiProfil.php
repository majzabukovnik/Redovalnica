<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Uporabniški profil</title>
</head>

<body>
<div class="navBar"><?php require_once __DIR__ . '/partials/navBar.php'; ?></div>
<div class="main">
    <div class="leftEdge"><p class="content"></p></div>
    <div class="content">
        <h1>Uporabniške nastavitve</h1>

        <form method="POST" action="">
            <img src="<?php echo $pictureDir; ?>" alt="profilna slika" class="user-profile-bigger"> <br> <br>
            <a href="/Redovalnica/spremeniProfilnoSliko/">Spremeni profilno sliko</a> <br> <br>
            <p class="osebniPodatki">Ime: <?php echo $_SESSION['ime']; ?></p>
            <p class="osebniPodatki">Priimek: <?php echo $_SESSION['priimek']; ?></p>
            <p class="osebniPodatki">Email: <?php echo $_SESSION['email']; ?></p>
            <p class="osebniPodatki">Naslov: <?php echo $_SESSION['naslov']; ?></p>
            <p class="osebniPodatki">Telefonska številka: <?php echo $_SESSION['telefonska_stevilka']; ?></p>
            <p class="osebniPodatki">Datum rojstva: <?php echo $_SESSION['datum_rojstva']; ?></p>
            <p class="osebniPodatki">Matični razred: <?php if(isset($_SESSION['razrednik'])){
                    echo $_SESSION['razrednik'];
                } else{
                    echo $_SESSION['razred'];
                } ?></p>
            <a href="/Redovalnica/odjava/">Odjava</a><br><br>
            <p class="osebniPodatki" style="font-weight: bold">Za spreminjanje zgornjih podatkov se prosimo obrnite na administratorja!</p>
            <br>
            <h2>Spremeni geslo</h2> <br>
            <label for="staroGeslo">Staro geslo: </label>
            <input name="staroGeslo" type="password"><br>

            <label for="novoGeslo1">Novo geslo: </label>
            <input name="novoGeslo1" type="password"><br>

            <label for="staroGeslo">Ponovno vnesite novo geslo: </label>
            <input name="novoGeslo2" type="password"><br>

            <input type="submit" value="Spremeni geslo"><br><br>

            <div>
                <ul>
                    <?php foreach ($err as $error) : ?>
                        <li><?php echo $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </form>
    </div>

    <div class="rightEdge"></div>
</div>
</body>

</html>
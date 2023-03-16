<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registracija razreda</title>
</head>

<body>
<div class="navBar"><?php require_once __DIR__ . '/partials/navBar.php'; ?></div>
<div class="main">
    <div class="leftEdge"><p class="content"></p></div>
    <div class="content">
        <form method="POST" action="">

            <label for="id_razreda">Naziv razreda: </label>
            <input name="id_razreda" type="text"><br>

            <label for="smer">Smer: </label>
            <input name="smer" type="text"><br>

            <input type="submit" value="Shrani podatke o razredu">  <br><br>

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

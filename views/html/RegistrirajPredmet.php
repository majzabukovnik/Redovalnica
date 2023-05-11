<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registracija predmeta</title>
</head>

<body>
<div class="navBar"><?php require_once __DIR__ . '/partials/navBar.php'; ?></div>
<div class="main">
    <div class="leftEdge"><p class="content"></p></div>
    <div class="content">
        <?php require_once __DIR__ . '/partials/navBar.php'; ?>
        <form method="POST" action="">
            <label for="id_predmeta">Ime predmeta: </label>
            <input type="text" name="id_predmeta"> <br>

            <label for="st_ur">Število ur: </label>
            <input type="text" name="st_ur"><br>

            <input type="submit" value="Shrani podatke o predmetu">  <br><br>

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
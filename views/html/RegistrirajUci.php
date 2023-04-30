<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registracij uči</title>
</head>

<body>
<body>
<div class="navBar"><?php require_once __DIR__ . '/partials/navBar.php'; ?></div>
<div class="main">
    <div class="leftEdge"><p class="content"></p></div>
    <div class="content">
        <form method="POST" action="">
            <label>Ime učitelja:</label>
            <?php foreach ($ucitelji as $ucitelj) : ?>
                <input type="checkbox" name="id_ucitelja[]" value="<?= $ucitelj['id_ucitelja'] ?>">
                <?= $ucitelj['ime'] . ' ' . $ucitelj['priimek'] ?> <br>
            <?php endforeach; ?> <br>

            <label for="razred">Razred: </label>
            <select name="id_predmeta">
                <?php foreach ($predmeti as $predmet) : ?>
                    <option value="<?= $predmet['id_predmeta'] ?>"><?= $predmet['id_predmeta'] ?></option>
                <?php endforeach; ?>
            </select> <br>

            <input type="submit" value="Shrani podatke o uči">  <br><br>

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
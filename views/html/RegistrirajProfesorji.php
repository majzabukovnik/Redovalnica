<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registracija profesorja</title>
</head>

<body>
<?php require_once __DIR__ . '/partials/navBar.php'; ?>
<form method="POST" action="">
    <label for="ime">Ime: </label>
    <input type="text" name="ime"> <br>

    <label for="priimek">Priimek: </label>
    <input type="text" name="priimek"><br>

    <label for="naslov">Naslov stalnega prebivališča: </label>
    <input type="text" name="naslov"><br>

    <label for="telefonska_stevilka">Telefonska številka: </label>
    <input type="text" name="telefonska_stevilka"> <br>

    <label for="email">Email: </label>
    <input type="email" name="email"> <br>

    <label for="id_ucitelja">Emšo: </label>
    <input type="text" name="id_ucitelja"> <br>

    <label for="datum_rojstva">Datum rojstva: </label>
    <input type="date" name="datum_rojstva"> <br>

    <label for="vloga">Vloga: </label>
    <select name="vloga">
        <option value="uci">Učitelj</option>
        <option value="adm">Administrator</option>
    </select> <br>

    <label for="razred">Razred: </label>
    <select name="razred">
        <?php foreach ($razredi as $razred) : ?>
            <option value="<?= $razred['id_razreda'] ?>"><?= $razred['id_razreda'] ?></option>
        <?php endforeach; ?>
    </select> <br>

    <input type="submit" value="Shrani podatke o dijaku">  <br>

    <div>
        <ul>
            <?php foreach ($err as $error) : ?>
                <li><?php echo $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</form>
</body>

</html>
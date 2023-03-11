<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
</head>

<body>
    <?php require_once __DIR__ . '/partials/navBar.php'; ?>
    <form method="POST" action="">
        <label for="ime">Ime: </label>
        <input type="text" name="ime"> <br>

        <label for="priimek">Priimek: </label><br>
        <input type="text" name="priimek">

        <label for="naslov">Naslov stalnega prebivališča: </label>
        <input type="text" name="naslov"><br>

        <label for="telefonska_stevilka">Telefonska številka: </label>
        <input type="text" name="telefonska_stevilka"> <br>

        <label for="email">Email: </label>
        <input type="email" name="email"> <br>

        <label for="id_dijaka">Emšo: </label>
        <input type="text" name="id_dijaka"> <br>

        <label for="datum_rojstva">Datum rojstva: </label>
        <input type="date" name="datum_rojstva">

        <label for="razred">Razred: </label>
        <select name="razred">
            <?php foreach ($razredi as $razred) : ?>
                <option value="<?= $razred->id_razreda ?>"><?= $razred->naziv_razreda ?></option>
            <?php endforeach; ?>
        </select>
    </form>
</body>

</html>
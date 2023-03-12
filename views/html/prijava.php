<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registracija dijaka</title>
</head>

<body>
<?php require_once __DIR__ . '/partials/navBar.php'; ?>
<form method="POST" action="">

    <label for="email">Email: </label>
    <input name="email" type="text"><br>

    <label for="geslo">Geslo: </label>
    <input name="geslo" type="password"><br>

    <input type="submit" value="Prijavi se">  <br>

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
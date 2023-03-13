<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
</head>

<body>
<div class="navBar"><?php require_once __DIR__ . '/partials/navBar.php'; ?></div>
<div class="main">
    <div class="leftEdge"><p class="content"></p></div>
    <div class="content">
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
    </div>
    <div class="rightEdge"></div>
</div>
<div class="footer"><?php //require_once "partials/footer.php"?></div>
</form>
</body>

</html>
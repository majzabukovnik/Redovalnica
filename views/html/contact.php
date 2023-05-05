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
        <h1>Stopite v stik z nami</h1>
        <form method="POST" action="">
            <label for="ime">Ime: </label>
            <input name="ime" type="text"><br>

            <label for="email">Email: </label>
            <input name="email" type="text"><br>

            <label for="sporocilo">Vaše sporočilo: </label>
            <textarea name="sporocilo" style="height: 200px;"></textarea>

            <input type="submit" value="Pošlji sporočilo">  <br><br>

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
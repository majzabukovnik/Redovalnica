<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Spremeni profilno sliko</title>
</head>

<body>
<div class="navBar"><?php require_once __DIR__ . '/partials/navBar.php'; ?></div>
<div class="main">
    <div class="leftEdge"><p class="content"></p></div>
    <div class="content">
        <h1>Spremeni profilno sliko</h1>

        <form method="POST" action="" enctype="multipart/form-data">
            <label for="file">Izberite profilno sliko: </label>
            <input name="file" type="file"><br>

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
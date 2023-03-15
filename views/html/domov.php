<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Redovalnica</title>
</head>

<body>
<div class="navBar"><?php require_once __DIR__ . '/partials/navBar.php'; ?></div>
<div class="main">
    <div class="leftEdge"><p class="content"></p></div>
    <div class="content">
        <h1>E-redovalnica</h1>
        <a href="/Redovalnica/registracijaDijaka">Registracija dijaka</a> <br>
        <a href="/Redovalnica/registracijaUcitelja">Registracija učitelja</a><br>
        <a href="/Redovalnica/registrirajRazred/">Registracija razreda</a>
    </div>
    <div class="rightEdge"></div>
</div>
<div class="footer"><?php require_once "partials/footer.php"?></div>
</form>
</body>

</html>
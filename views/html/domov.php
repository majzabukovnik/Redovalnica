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
        <a href="/Redovalnica/registracijaDijaka/">Registracija dijaka</a> <br>
        <a href="/Redovalnica/registracijaUcitelja/">Registracija učitelja</a><br>
        <a href="/Redovalnica/registrirajRazred/">Registracija razreda</a><br>
        <a href="/Redovalnica/registrirajPredmet/">Registracija predmeta</a><br>
        <a href="/Redovalnica/registrirajUci/">Registracija uči</a><br>

        <br><a href="/Redovalnica/odjava/">Odjava</a><br>

    </div>
    <div class="rightEdge"></div>
</div>
</body>
</html>
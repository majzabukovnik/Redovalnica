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
        <?php if (isset($_SESSION['ime'])): ?>
            <h1>Pozdravljen/a <?php echo $_SESSION['ime'] ?>!</h1>
            <p class="trenutna_ura">Trenutna ura: <?php echo $trenutna_ura ?></p>
        <?php endif; ?>
        <?php if(!isset($_SESSION['ime'])): ?>
            <h1>E-redovalnica</h1>
        <?php endif; ?>

    </div>
    <div class="rightEdge"></div>
</div>
</body>
</html>
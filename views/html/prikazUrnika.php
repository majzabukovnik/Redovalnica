<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registracija dijaka</title>
    <style><?php require_once __DIR__ . '/../css/timetable.css'; ?></style>
</head>

<body>
<div class="navBar"><?php require_once __DIR__ . '/partials/navBar.php'; ?></div>
<div class="main">
    <div class="leftEdge"><p class="content"></p></div>
    <div class="content">
        <?php require_once __DIR__ . '/partials/navBar.php'; ?>

        <form method="POST" action="">
            <label for="razred">Razred: </label>
            <select name="razred">
                <?php foreach ($razredi as $razred) : ?>
                    <option value="<?= $razred['id_razreda'] ?>"><?= $razred['id_razreda'] ?></option>
                <?php endforeach; ?>
            </select> <br>

            <input type="submit" value="Prikaži urnik"> <br><br>

            <?php view('partials/timetable', [
                'urnik' => $urnik
            ]); ?>

        </form>
    </div>
    <div class="rightEdge"></div>
</div>
</body>
</html>
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
            <table class="timetable-table">
                <thead>
                <tr>
                    <th>Predmet</th>
                    <th>Ocene</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($displayData as $predmet => $ocene): ?>
                    <tr>
                        <td><?php echo $predmet ?></td>
                        <td>
                            <?php foreach ($ocene as $ocena): ?>
                                <?php echo '<div style="color: ' . $barva[$ocena[1]] . '; display: inline;">' . $ocena[0] . '</div>'; ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

            <div>
                <ul>
                    <?php foreach ($err as $error) : ?>
                        <li><?php echo $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </form>
        <div class="rightEdge"></div>
    </div>
</body>
</html>
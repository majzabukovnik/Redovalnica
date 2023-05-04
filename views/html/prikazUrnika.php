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

            <input type="submit" value="Prikaži urnik">  <br><br>

            <div class="timetable">
                <?php if (!empty($urnik)): ?>
                    <table class="timetable-table">
                        <thead>
                        <tr>
                            <th>Ura</th>
                            <th>Ponedeljek</th>
                            <th>Torek</th>
                            <th>Sreda</th>
                            <th>Četrtek</th>
                            <th>Petek</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $dnevi = ['pon', 'tor', 'sre', 'cet', 'pet'];
                        for ($i = 0; $i < 9; $i++) {
                            echo '<tr>';
                            echo "<td class=\"hour-cell\">$i</td>";
                            foreach ($dnevi as $dan) {
                                $class = isset($urnik[strval($i) . '_' . $dan]) ? 'data-cell' : 'empty-cell';
                                echo '<td class="' . $class . '">' . $urnik[strval($i) . '_' . $dan] . '</td>';
                            }
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

        </form>
    </div>
    <div class="rightEdge"></div>
</div>
</body>
</html>
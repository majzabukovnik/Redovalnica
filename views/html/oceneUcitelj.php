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
            <label for="razred">Razred: <?php echo !empty($ucenci) ? $_POST['razred'] : ''; ?></label>
            <label for="predmet"> <?php echo !empty($ucenci) ? 'Predmet: ' . $_POST['predmet'] : ''; ?></label>

            <?php view('partials/razred-predmet-form', [
                    'ucenci' => $ucenci,
                    'razredi_predmeti' => $razredi_predmeti
            ]); ?>

            <div class="ocene">
                <input name="id_uci" value="<?php echo $id_uci; ?>" type="hidden">
                <?php if (!empty($ucenci)): ?>
                    <table class="timetable-table">
                        <thead>
                        <tr>
                            <th>Dijaki</th>
                            <th>Ocene</th>
                            <th>Vnos ocene</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($ucenci as $ucenec): ?>
                            <tr>
                                <td><?php echo $ucenec['priimek'] . ' ' . $ucenec['ime']; ?></td>
                                <td>
                                    <?php foreach ($ocene[$ucenec['id_dijaka']] as $ocena): ?>
                                        <?php echo '<div style="color: ' . $barva[$ocena['tip_ocene']] .'; display: inline;">' . $ocena['ocena'] . '</div>';?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <div style="display: inline">
                                        <select name="<?php echo $ucenec['id_dijaka'] ?>">
                                            <option name="<?php echo $ucenec['id_dijaka'] ?>" value=""></option>
                                            <?php foreach ($barva as $key => $value): ?>
                                                <?php for ($i = 1; $i < 6; $i++): ?>
                                                    <option value="<?php echo $i . '-' . $key; ?>"><?php echo $i . ' ' . $key; ?></option>
                                                <?php endfor; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <input type="submit" value="Shrani podatke o ocenah">  <br><br>
                <?php endif; ?>
            </div>
            <?php if (empty($ucenci)): ?>
                <input type="submit" value="Prikaži razredni seznam">  <br><br>
            <?php endif; ?>

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
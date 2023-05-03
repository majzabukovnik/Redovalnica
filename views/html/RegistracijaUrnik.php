<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registracija predmeta</title>
</head>

<body>
<div class="navBar"><?php require_once __DIR__ . '/partials/navBar.php'; ?></div>
<div class="main">
    <div class="leftEdge"><p class="content"></p></div>
    <div class="content">
        <?php require_once __DIR__ . '/partials/navBar.php'; ?>
        <form method="POST" action="">
            <label for="razred">Razred: </label>
            <select name="razred" id="razredSelect">
                <?php foreach ($razredi as $razred) : ?>
                    <option value="<?= $razred['id_razreda'] ?>"><?= $razred['id_razreda'] ?></option>
                <?php endforeach; ?>
            </select> <br>

            <table>
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

                <?php
                $dnevi = ['pon', 'tor', 'sre', 'cet', 'pet'];
                for ($i = 0; $i < 9; $i++) {
                    echo '<tr>';
                    echo "<td>$i</td>";
                    foreach ($dnevi as $dan) {
                        echo '<td>';
                        echo '<select name="' . $i . '_' . $dan . '">';
                        echo '<option value=""></option>';
                        foreach ($uci as $item) {
                            foreach ($ucitelji as $ucitelj){
                                if($ucitelj['id_ucitelja'] === $item['id_ucitelja']){
                                    echo '<option value="' . $item['id_uci'] . '">' . $item['id_predmeta'] . ' - ' . $ucitelj['ime'] . ' ' . $ucitelj['priimek'] . '</option>';
                                }
                            }
                        }

                        echo '</select>';
                        echo '</td>';
                    }
                    echo '</tr>';
                }
                ?>
            </table>

            <input type="submit" value="Shrani urnik"><br><br>

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

<script>
    var razredSelect = document.getElementById("razredSelect");
    var stUrLabel = document.getElementById("stUrLabel");
    var stUrInput = document.getElementById("stUrInput");

    razredSelect.addEventListener("change", function() {
        if (razredSelect.value !== "") {
            stUrLabel.style.display = "block";
            stUrInput.style.display = "block";
        } else {
            stUrLabel.style.display = "none";
            stUrInput.style.display = "none";
        }
    });
</script>

</body>
</html>

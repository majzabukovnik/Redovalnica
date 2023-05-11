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
<?php if (empty($ucenci)): ?>
    <select name="razred">
        <?php $unique_classes = array_unique(array_column($razredi_predmeti, 'id_razreda'));
        foreach ($unique_classes as $razred) : ?>
            <option value="<?php echo $razred ?>"><?php echo $razred ?></option>
        <?php endforeach; ?>
    </select> <br>

    <label for="predmet">Predmet: <?php echo !empty($ucenci) ? $_POST['predmet'] : ''; ?></label>
    <select name="predmet">
        <?php $uniquePredmeti = array_unique(array_column($razredi_predmeti, 'id_predmeta'));
        foreach ($uniquePredmeti as $predmet) : ?>
            <option value="<?= $predmet ?>"><?= $predmet ?></option>
        <?php endforeach; ?>
    </select>
    <br>
<?php endif; ?>
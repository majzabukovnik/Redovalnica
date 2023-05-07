<?php if (empty($ucenci)): ?>
    <select name="razred">
        <?php foreach ($razredi_predmeti as $razred) : ?>
            <option value="<?= $razred['id_razreda'] ?>"><?= $razred['id_razreda'] ?></option>
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
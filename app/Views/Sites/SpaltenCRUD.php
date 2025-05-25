<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<main>
    <div class="container mt-3">
        <div class="card">
            <h5 class="card-header text-white" style="background-color: #002060"><?php echo $title; ?></h5>
            <div class="card-body">
                <form action="<?php echo base_url('/submitSpalten')?>" method="post">
                    <input type="hidden" name="id" value="<?php echo isset($update['id']) ? $update['id'] : '' ?>">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="Spalte" class="form-label">Bezeichnung der Spalte</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control <?=(isset($error['Spalte']))?'is-invalid':'' ?>" id="Spalte" name="Spalte" value="<?php echo isset($update['spalte']) ? $update['spalte'] : '' ?>" <?php if ($todo == 2) {echo 'disabled';} ?>>
                            <div class="invalid-feedback">
                                <?php if(isset($error['Spalte'])) echo $error['Spalte']; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="Spaltenbeschreibung" class="form-label">Spaltenbeschreibung</label>
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control <?=(isset($error['Spaltenbeschreibung']))?'is-invalid':'' ?>" id="Spaltenbeschreibung" style="height: 100px" name="Spaltenbeschreibung" <?php if ($todo == 2) {echo 'disabled';} ?>><?php echo isset($update['spaltenbeschreibung']) ? $update['spaltenbeschreibung'] : '' ?></textarea>
                            <div class="invalid-feedback">
                                <?php if(isset($error['Spaltenbeschreibung'])) echo $error['Spaltenbeschreibung']; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="Sortid" class="form-label">Sortid</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" class="form-control <?=(isset($error['Sortid']))?'is-invalid':'' ?>" id="Sortid" name="Sortid" value="<?php echo isset($update['sortid']) ? $update['sortid'] : '0' ?>" <?php if ($todo == 2) {echo 'disabled';} ?>>
                            <div class="invalid-feedback">
                                <?php if(isset($error['Sortid'])) echo $error['Sortid']; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="Spalte" class="form-label">Board auswählen</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Board" type="text" id="Board" name="Board" <?php if ($todo == 2) {echo 'disabled';} ?>>
                                <?php for($i=0; $i < count($boards); $i++): ?>
                                    <option value="<?php echo $boards[$i]['id'] ?>" <?php if (isset($update['id'])) {if($update['boardsid'] == $boards[$i]['id']){echo 'selected';}} ?>><?php echo $boards[$i]['board'] ?></option>
                                <?php endfor;?>
                            </select>
                        </div>
                    </div>
                    <?php if($todo == 0) : ?>
                        <button type="submit" class="btn btn-success mt-3" name="submitSpalten" id="submitSpalten">
                            <i class="fa-solid fa-plus"></i> Hinzufügen</button>
                    <?php endif ?>

                    <?php if($todo == 1) : ?>
                        <button type="submit" class="btn btn-success mt-3" name="submitSpalten" id="submitSpalten">
                            <i class="fa-solid fa-floppy-disk"></i> Speichern</button>
                    <?php endif ?>
                    <?php if($todo == 2) : ?>
                        <button type="submit" class="btn btn-danger mt-3" name="deleteSpalten" id="deleteSpalten">
                            <i class="fa-solid fa-trash-can"></i> Löschen</button>
                    <?php endif ?>
                    <a class="btn btn-secondary mt-3" href="<?=base_url("Spalten")?>">Abbrechen</a>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>

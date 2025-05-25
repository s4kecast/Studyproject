<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<main>
    <div class="container mt-3">
        <div class="card">
            <h5 class="card-header text-white" style="background-color: #002060"><?php echo $title; ?></h5>
            <div class="card-body">
                <form action="<?php echo base_url('/submitBoards')?>" method="post">
                    <input type="hidden" name="id" value="<?php echo isset($update['id']) ? $update['id'] : '' ?>">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="Board" class="form-label">Bezeichnung des Boards</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control <?=(isset($error['Board']))?'is-invalid':'' ?>" id="Board" name="Board" value="<?php echo isset($update['board']) ? $update['board'] : '' ?>" <?php if ($todo == 2) {echo 'disabled';} ?>>
                            <div class="invalid-feedback">
                                <?php if(isset($error['Board'])) echo $error['Board']; ?>
                            </div>
                        </div>
                    </div>
                    <?php if($todo == 0) : ?>
                        <button type="submit" class="btn btn-success mt-3" name="submitBoards" id="submitBoards">
                            <i class="fa-solid fa-plus"></i> Hinzufügen</button>
                    <?php endif ?>

                    <?php if($todo == 1) : ?>
                        <button type="submit" class="btn btn-success mt-3" name="submitBoards" id="submitBoards">
                            <i class="fa-solid fa-floppy-disk"></i> Speichern</button>
                    <?php endif ?>
                    <?php if($todo == 2) : ?>
                        <button type="submit" class="btn btn-danger mt-3" name="deleteBoards" id="deleteBoards">
                            <i class="fa-solid fa-trash-can"></i> Löschen</button>
                    <?php endif ?>
                    <a class="btn btn-secondary mt-3" href="<?=base_url("Boards")?>">Abbrechen</a>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>

<?= $this->extend('layouts/layout') ?>

<!--Content Section-->
<?= $this->section('content') ?>
<main>
    <div class="card">
        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h3 class="card-title">Tasks</h3>
<!--            Dropdown für Boards-->
            <select name="boards" id="boards" style="width: 200px; height: 35px; border-radius: 5px; border: 1px solid #ccc; padding: 5px;">
                <?php foreach ($boards as $board): ?>
                    <option value="<?= $board['id'] ?>" <?= $board['id'] == $boardID ? 'selected' : '' ?>><?= $board['board'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3 mt-2">
                <div class="col-auto">
                    <a href="<?php echo base_url();?>taskErstellen" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Neu</a>
                </div>
            </div>
            <div class="d-flex flex-row flex-nowrap overflow-auto">
<!--                Spalten-->
                <?php foreach ($spalten as $spalten): ?>
                    <div class="me-3">
                        <div class="card mb-3" style="width: 22.5em">
                            <div class="card-header text-white" style="background-color: #002e83">
                                <h5 class="card-title h5 mb-1"><?= $spalten['spalte'] ?></h5>
                                <small class="mb-0"><?= $spalten['spaltenbeschreibung'] ?></small>
                            </div>
                            <div class="card-body dragparent">
<!--                                Tasks-->
                                <?php foreach ($tasks as $task): ?>
                                    <?php if ($task['spaltenid'] == $spalten['id']): ?>
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-1">
                                                    <div class="me-3">
                                                        <h5 class="card-title"><?= $task['tasks'] ?></h5>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-1">
<!--                                                        Bearbeiten und Löschen-->
                                                        <a href="<?php echo base_url('/taskBearbeiten'.'/' . $task['id'] . '/1'); ?>" style="color: transparent">
                                                            <i class="fa-symbols fas fa-pen-to-square text-dark"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('/taskLoeschen'.'/' . $task['id'] . '/2'); ?>">
                                                            <i class="fa-symbols fa-solid fa-trash ps-1 text-danger"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between mb-1">
                                                    <div class="text-secondary">
                                                        <i class="fa-regular fa-calendar fa-fw"></i>
<!--                                                       Datum-->
                                                        <?= date('d.m.Y', strtotime($task['erstelldatum'])) ?>
                                                    </div>
                                                    <div class="text-secondary">
<!--                                                        Erinnerung-->
                                                        <?php if (isset($task['erinnerungsdatum']) && $task['erinnerung']==1) : ?>
                                                        <i class="fa-regular fa-bell fa-fw"></i>
                                                        <?= date('d.m.Y H:i', strtotime($task['erinnerungsdatum'])) ?>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div class="text-secondary">
                                                        <i class="fa-regular fa-user fa-fw"></i>
<!--                                                        Person-->
                                                        <?php foreach ($personen as $person): if ($task['personenid'] == $person['id']) : echo($person['vorname'] . ' ' . $person['name']); endif; endforeach; ?>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between mb-1">
<!--                                                    Notizen-->
                                                    <p class="card-text"><?= $task['notizen'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script>
        // Board wechseln
        document.getElementById('boards').addEventListener('change', function() {
            var boardId = this.value;
            fetch('/public/setBoardId/' + boardId);
            setTimeout(function() {
                location.reload();
            }, 200);
        });

        // Drag and Drop
        document.addEventListener('DOMContentLoaded', function() {
            var containers = Array.from(document.querySelectorAll('.dragparent'));
            dragula(containers);
        });
    </script>
</main>
<?= $this->endSection() ?>

<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
    <main>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Boards</h3>
            </div>
            <div class="card-body">
                <a href="<?php echo base_url();?>boardErstellen" class="btn btn-success btn-sm">
                    <i class="fa-solid fa-plus"></i> Erstellen</a>
                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-striped table-responsive table-hover d-table"
                           data-show-columns="true"
                           data-show-toggle="true"
                           data-toggle="table"
                           data-search="true"
                           data-toolbar="#toolbar">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Board</th>
                            <th>Bearbeiten</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (empty($boards)): ?>
                            <tr>
                                <td colspan="12">Keine Boards gefunden.</td>
                            </tr>
                        <?php else:
                            foreach ($boards as $item): ?>
                                <tr>
                                    <td><?= $item['id'] ?></td>
                                    <td><?= $item['board'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url('/boardBearbeiten'.'/' . $item['id'] . '/1'); ?>" style="color: transparent">
                                            <i class="fa-symbols fas fa-pen-to-square text-dark"></i>
                                        </a>
                                        <a href="<?php echo base_url('/boardLoeschen'.'/' . $item['id'] . '/2'); ?>">
                                            <i class="fa-symbols fa-solid fa-trash ps-1 text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;
                        endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
<?= $this->endSection() ?>
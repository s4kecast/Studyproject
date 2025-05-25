<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $title; ?> | Task Board </title>
    <link rel="icon" href="<?php echo base_url();?>Material/LogoIcon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url();?>Material/LogoIcon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url();?>Style.css">
    <link href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/bevacqua/dragula@3.7.3/dist/dragula.min.css" rel="stylesheet">
</head>
<body>
<!--Header-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark mb-1 mt-1 ps-3">
            <a class="navbar-brand" href="<?php echo base_url();?>Startseite">
                <img src="<?php echo base_url();?>Material/Logo.svg" alt="Logo" width="200" class="d-inline-block align-text-top">
            </a>
            <div class=" vertical-line d-none d-lg-block mx-3"></div>
            <button class="navbar-toggler border-2 me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav nav-pills">
                    <li class="nav-item">
                        <a class="<?php echo ($title == 'Startseite') ? 'active' : ''; ?> nav-link" href="<?php echo base_url();?>Startseite">Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?php echo ($title == 'Boards') ? 'active' : ''; ?> nav-link" href="<?php echo base_url();?>Boards">Boards</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?php echo ($title == 'Spalten') ? 'active' : ''; ?> nav-link" href="<?php echo base_url();?>Spalten">Spalten</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <?= $this->renderSection('content') ?>
<!--Footer-->
    <footer>
        <div class="container-fluid mb-3 mt-3 ps-3 d-flex flex-wrap justify-content-between">
            <span class="footer-text">
                © 2023 Meine Webseite
            </span>
            <span class="footer-text">
                <a class="footer-link" href="#">Impressum</a>
                <a class="footer-link ms-1" href="#">AGB</a>
                <a class="footer-link ms-1" href="#">Datenschutz</a>
            </span>
        </div>
    </footer>
    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/26d48bf35d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.js"></script>
    <script src='https://cdn.jsdelivr.net/gh/bevacqua/dragula@3.7.3/dist/dragula.min.js'></script>
</body>
</html>
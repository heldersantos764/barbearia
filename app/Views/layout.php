<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia</title>
    <link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap-5.3.3-dist/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/libs/toastify/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css')?>">
    <?= $this->renderSection('css') ?>
</head>
<body>
    <?= $this->renderSection('content') ?>
    <script src="<?= base_url('assets/libs/bootstrap-5.3.3-dist/js/bootstrap.min.js')?>"></script>
    <script src="<?= base_url('assets/libs/axios/script.js')?>"></script>
    <script src="<?= base_url('assets/libs/toastify/script.js')?>"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
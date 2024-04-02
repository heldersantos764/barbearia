<?= $this->extend('layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<div class="login bg-dark d-flex justify-content-center flex-column align-items-center">

    <div class="image d-flex justify-content-center">
        <img src="<?= base_url('assets/image/logo.png') ?>" alt="">
    </div>

    <div class="form-login col col-md-4 col-lg-2 col-sm-10" id="form-login">
        <form method="post" action="<?= base_url('login') ?>" class="d-flex flex-column gap-3 mt-4">
            <input type="password" name="password" id="password" class="form-control" autofocus>
            <div class="d-grid">
                <button type="submit" class="btn btn-danger">Entrar</button>
            </div>
        </form>
    </div>

</div>

<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<?php if (session()->has('error')) : ?>
    <script>
        Toastify({
            text: '<?= session('error') ?>',
            backgroundColor: '#dc3545'
        }).showToast();
    </script>
<?php endif ?>
<?= $this->endSection() ?>
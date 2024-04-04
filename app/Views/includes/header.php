<header id="menu" class="bg-dark px-3 py-2 d-flex justify-content-between align-items-center">
    <a href="<?= base_url('home') ?>">
        <img src="<?= base_url('assets/image/logo2.png') ?>" alt="logo">
    </a>

    <div class="menu-links d-flex gap-3">
        <a href="<?= site_url()?>">Início</a>
        <a href="<?= site_url('dashboard/history')?>">Histórico</a>
        <a href="">Relatórios</a>
    </div>
    <div class="btn-sair">
        <a href="<?= base_url('logout') ?>" class="btn btn-danger">Sair</a>
    </div>
</header>
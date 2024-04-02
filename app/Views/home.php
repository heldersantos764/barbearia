<?= $this->extend('layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?= $this->include('includes/header') ?>

<div class="container">
    <h1 class="fs-3 my-2 text-center">Entradas do dia - <?= date('d/m/Y') ?></h1>
    <div class="bg-dark pt-3 px-4 d-flex justify-content-between align-itens-center">
        <form action="<?=site_url('dashboard/entry')?>" method="post" class="row g-3" autocomplete="off">
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Password</label>
                <input name="value" required oninput="atualizarValorFormatado(this)" type="texte" class="form-control" id="entrada" placeholder="Valor da entraga" autofocus>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-danger mb-3">Adicionar</button>
            </div>
        </form>

        <div class="text-light fs-5 mt-1" id="total">
            Apurado do Dia: <span id="valor" class="bg-success px-3 rounded-3 fw-bolder">
                <?php 
                    if (isset($entries) && !empty($entries)){
                        $amount = 0;
                        foreach($entries as $entry){
                            $amount += $entry->value;
                        }
                        echo "R$ ".number_format($amount, 2, ',', '.');
                    }else{
                        echo "R$ 0,00";
                    }
                ?>
            </span>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>VALOR</th>
                    <th>DATA E HORA</th>
                    <th class="text-right">OPÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($entries) && !empty($entries)) : ?>
                    <?php foreach($entries as $entry):?>
                        <tr>
                            <td><?=$entry->id?></td>
                            <td>R$ <?=number_format($entry->value, 2, ',', '.');?></td>
                            <td><?=date('d/m/Y H:i:s', strtotime($entry->created_at))?></td>
                            <td class="text-right">
                                <a href="<?= site_url('dashboard/entry/delete/'.$entry->id)?>" class="btn btn-danger btn-sm btn-delete">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="empty-data">
                            <h1>Nenhum registro encontrado!</h1>
                        </td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/home.js') ?>"></script>

<?php if (session()->has('success')) : ?>
    <script>
        Toastify({
            text: '<?= session('success') ?>',
            backgroundColor: '#28a745'
        }).showToast();
    </script>
<?php endif ?>

<?php if (session()->has('error')) : ?>
    <script>
        Toastify({
            text: '<?= session('error') ?>',
            backgroundColor: '#dc3545'
        }).showToast();
    </script>
<?php endif ?>
<?= $this->endSection() ?>
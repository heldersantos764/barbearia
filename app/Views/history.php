<?= $this->extend('layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/history.css') ?>">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?= $this->include('includes/header') ?>

<div class="container">
    <h1 class="fs-3 my-2 text-center">Histórico de Entradas</h1>     

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>VALOR</th>
                    <th>DATA E HORA</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($entries) && !empty($entries)) : ?>
                    <?php foreach($entries as $entry):?>
                        <tr>
                            <td><?=$entry->id?></td>
                            <td>R$ <?=number_format($entry->value, 2, ',', '.');?></td>
                            <td><?=date('d/m/Y H:i:s', strtotime($entry->created_at))?></td>
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
        <div class="py-3 paginacao-personalizada">
            <?=isset($pager) ? $pager->links() : ''?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
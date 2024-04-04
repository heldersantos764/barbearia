<?= $this->extend('layout') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?= $this->include('includes/header') ?>

<div class="container">
    <h1 class="fs-3 my-2 text-center">Total de entradas dos últimos 3 meses</h1>
    <div id="chart_div" class="d-flex justify-content-center"></div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Entrada');
        data.addRows([
            ['<?= explode(' ', $months['mesAntepenultimo'])[2] ?>', <?= $monthSum3 ?>],
            ['<?= explode(' ', $months['mesPenultimo'])[2] ?>', <?= $monthSum2 ?>],
            ['<?= explode(' ', $months['mesAtual'])[2] ?>', <?= $monthSum1 ?>],
        ]);

        var formatter = new google.visualization.NumberFormat({
            prefix: 'R$ ',
            decimalSymbol: ',',
            groupingSymbol: '.',
            fractionDigits: 2
        });
        formatter.format(data, 1);

        var options = {
            'title': '',
            'width': 700,
            'height': 450
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<?= $this->endSection() ?>
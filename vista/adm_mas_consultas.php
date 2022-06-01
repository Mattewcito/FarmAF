<?php
session_start();
if ($_SESSION['us_tipo'] == 3) {
    include_once 'Comple/header.php';
?>
    <title>ADM | FarmAF</title>
    <?php
    include_once 'Comple/nav.php';
    ?>
    <!-- CONTENIDO -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Mas consultas</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Consultas generales</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Ventas por mes del año actual</h2>
                                <div class="chart-responsive">
                                    <canvas id='Grafico1' style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h2>Top 3 vendedores del mes</h2>
                                <div class="chart-responsive">
                                <canvas id='Grafico2' style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h2>Comparativa de años anteriores</h2>
                                <div class="chart-responsive">
                                <canvas id='Grafico3' style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h2>Los 5 productos mas vendidos en el mes</h2>
                                <div class="chart-responsive">
                                <canvas id='Grafico4' style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h2>Top cliente del mes</h2>
                                <div class="chart-responsive">
                                <canvas id='Grafico5' style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- FIN DEL CONTENIDO -->

<?php
    include_once 'Comple/footer.php';
} else {
    header('Location: ../vista/login.php');
}
?>
<script src="../js/Chart.min.js"></script>
<script src="../js/Mas_consultas.js"></script>
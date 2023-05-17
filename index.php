<?php
require_once './fetch.php';
$data = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['codigo'];

    $show = new MostrarData();
    $data = $show->mostrar($id);
    if (is_array($data) && isset($data['costo'])) {
        $dolar = number_format(floatval($data['costo']) / 3.70, 2);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">

    <script src="https://www.paypal.com/sdk/js?client-id=AVUiaXyUPSgJqxipeSeAJBOqqLRWuMAnXPEOiXIcKaFp3LllEKXSRhDAuMpKubk_9kO6PGwXYN3CyJPP&currency=USD&components=buttons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <form class="row g-3 mb-2" action="" method="POST">
            <div class="col-md-3">
                <label class="form-label">Ingrese su código de pago</label>
                <input type="text" class="form-control mb-2" placeholder="Codigo de Pago" name="codigo" id="codigo" required>

                <button class="btn btn-primary"> Verificar </button>
            </div>
        </form>
        <?php if (is_array($data) && $data['total'] == 1) : ?>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                <div class="alert alert-success col-md-3 text-center" role="alert">
                    Este Codigo ya esta Pagado
                </div>
            <?php endif; ?>
        <?php else : ?>
            <?php if (!empty($data)) : ?>
                <div class="paypal-buttons">
                    <ul class="list-group">
                        <li class="list-group-item">
                            Tramite : <?= $data['nombre'] ?>
                        </li>
                        <li class="list-group-item">
                            Descripcion : <?= $data['descripciont'] ?>
                        </li>
                        <li class="list-group-item">
                            Dni : <?= $data['dni_user'] ?>
                        </li>
                        <li class="list-group-item">
                            Nombre : <?= $data['nombre'] ?>
                        </li>
                        <li class="list-group-item">
                            Precio : <?= number_format($data['costo'], 2) . ' Soles Peruanos' ?>
                        </li>
                        <li class="list-group-item">
                            Precio en Dolares: <?= $dolar . ' Dolares Americanos' ?>
                        </li>
                    </ul>
                    <div id="paypal-button-container"></div>
                </div>
            <?php else : ?>
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                    <div class="alert alert-danger col-md-3 text-center" role="alert">
                        No existe el codigo de pago
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div>
                <?= var_dump($data) ?>
            </div>
    </div>
<?php endif; ?>
</div>
</body>
<?php include_once './script.php' ?>

</html>
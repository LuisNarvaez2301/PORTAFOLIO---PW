<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Pedido</title>
    <link rel="stylesheet" type="text/css" href="public\css\styles.css">
</head>
<body>
    <?php include 'app\views\layaout\header.php'; ?>
    <div class="container">
        <h1>Detalle del Pedido</h1>
        <p>ID Pedido: <?php echo $pedido['id']; ?></p>
        <p>Fecha: <?php echo $pedido['fecha_pedido']; ?></p>
        <p>Estado: <?php echo $pedido['estado']; ?></p>
        <h2>Detalles de los productos</h2>
        <!-- Aquí puedes agregar más detalles sobre los productos incluidos en el pedido -->
        <h2>Detalles de Pago</h2>
        <p>Por favor, realiza la transferencia a la cuenta Nequi: 123456789</p>
        <p>Una vez realizada la transferencia, tu pedido será procesado.</p>
    </div>
    <?php include 'app\views\layaout\footer.php'; ?>
</body>
</html>

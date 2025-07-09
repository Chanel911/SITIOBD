<?php
include 'conexion.php';

$id = $_GET["id"];
$sentencia = $conexion->prepare("SELECT * FROM clientes WHERE id = ?");
$sentencia->execute([$id]);
$cliente = $sentencia->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff0f5;
        }

        .container {
            margin-top: 50px;
            background-color: #ffe4ec;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(255, 192, 203, 0.4);
            max-width: 600px;
        }

        h2 {
            color: #d46a92;
            margin-bottom: 30px;
            text-align: center;
        }

        p {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .btn-back {
            background-color: #f78fb3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-back:hover {
            background-color: #f368a5;
            color: white;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            height: 80px;
        }
    </style>
</head>
<body>
<div class="container">
    <img src="logo.jpg.png" alt="Logo Glaseado Rosa" class="logo">
    <h2>Detalles del Cliente</h2>
    <p><strong>Nombre:</strong> <?= $cliente['nombre'] ?></p>
    <p><strong>Correo:</strong> <?= $cliente['correo'] ?></p>
    <p><strong>Teléfono:</strong> <?= $cliente['telefono'] ?></p>
    <p><strong>Dirección:</strong> <?= $cliente['direccion'] ?></p>
    <a href="panel.php" class="btn-back">⬅️ Volver</a>
</div>
</body>
</html>

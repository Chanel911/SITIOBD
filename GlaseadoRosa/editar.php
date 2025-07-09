<?php
include 'conexion.php';

$id = $_GET["id"];
$sentencia = $conexion->prepare("SELECT * FROM clientes WHERE id = ?");
$sentencia->execute([$id]);
$cliente = $sentencia->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];

    $actualizar = $conexion->prepare("UPDATE clientes SET nombre=?, correo=?, telefono=?, direccion=? WHERE id=?");
    $actualizar->execute([$nombre, $correo, $telefono, $direccion, $id]);

    header("Location: panel.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
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

        .btn-primary {
            background-color: #f78fb3;
            border: none;
        }

        .btn-primary:hover {
            background-color: #f368a5;
        }

        .btn-secondary {
            background-color: #f3a683;
            border: none;
        }

        label {
            font-weight: 500;
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
    <h2>Editar Cliente</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= $cliente['nombre'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control" value="<?= $cliente['correo'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="<?= $cliente['telefono'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="<?= $cliente['direccion'] ?>" required>
        </div>
        <button class="btn btn-primary" type="submit">Guardar Cambios</button>
        <a href="panel.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>

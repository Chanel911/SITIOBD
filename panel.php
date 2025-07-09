<?php
include 'conexion.php';
$clientes = $conexion->query("SELECT * FROM clientes");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Clientes - Glaseado Rosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff0f5;
        }

        .container {
            margin-top: 30px;
            background-color: #ffe4ec;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(255, 192, 203, 0.4);
        }

        h1 {
            color: #d46a92;
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-success {
            background-color: #f78fb3;
            border: none;
        }

        .btn-success:hover {
            background-color: #f368a5;
        }

        .btn-info {
            background-color: #f3a683;
            border: none;
        }

        .btn-warning {
            background-color: #f7d794;
            border: none;
        }

        .btn-danger {
            background-color: #f8a5c2;
            border: none;
        }

        .table thead {
            background-color: #ffc0cb;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #fff5f8;
        }

        .btn-center {
            display: flex;
            justify-content: center;
            margin-top: 30px;
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
        <h1>Lista de Clientes</h1>
        <div class="text-end mb-3">
            <a href="agregar.php" class="btn btn-success">➕ Agregar Cliente</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Correo</th><th>Teléfono</th><th>Dirección</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $clientes->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["nombre"] ?></td>
                        <td><?= $row["correo"] ?></td>
                        <td><?= $row["telefono"] ?></td>
                        <td><?= $row["direccion"] ?></td>
                        <td>
                            <a href="ver.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar cliente?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="btn-center">
            <a href="index.php" class="btn-back">⬅️ Regresar al inicio</a>
        </div>
    </div>
</body>
</html>

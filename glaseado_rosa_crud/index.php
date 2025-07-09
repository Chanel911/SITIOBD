<?php
include 'conexion.php';
$clientes = $conexion->query("SELECT * FROM clientes");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes - Glaseado Rosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Clientes</h1>
        <a href="agregar.php" class="btn btn-success mb-3">Agregar Cliente</a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Nombre</th><th>Correo</th><th>Teléfono</th><th>Dirección</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = $clientes->fetch_assoc()): ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["nombre"] ?></td>
                    <td><?= $row["correo"] ?></td>
                    <td><?= $row["telefono"] ?></td>
                    <td><?= $row["direccion"] ?></td>
                    <td>
                        <a href="ver.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Ver</a>
                        <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
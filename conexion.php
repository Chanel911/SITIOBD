<?php
$host = 'dpg-d1ne1j3e5dus73aojh60-a.oregon-postgres.render.com';
$db   = 'glaseado_rosa';
$user = 'chanel';
$pass = 'jc1uazsfDJE9thWc8FBVs5Ljylq9FdoG';
$port = '5432';

try {
    $conexion = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

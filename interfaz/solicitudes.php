<?php
$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();

$usuarios = BDRepository::selectUniversal($conexion, 'userPendiente');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>contraseña</th>
        </tr>
        <?php foreach ($usuarios as $usuario): 
            ?>
        <tr>
            <td><?php echo htmlspecialchars($usuario->get_IdPendiente()); ?></td>
            <td><?php echo htmlspecialchars($usuario->get_Nombre()); ?></td>
            <td><?php echo htmlspecialchars($usuario->get_Contraseña()); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

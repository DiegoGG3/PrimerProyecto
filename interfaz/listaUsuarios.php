<?php
$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();

$usuarios = BDRepository::selectUniversal($conexion, 'User');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
</head>
<body>
    <table>
        <tr>
            <th>Nombre</th>
            <th>contraseña</th>
            <th>Role</th>
        </tr>
        <?php foreach ($usuarios as $usuario): 
            ?>
        <tr>
            <td><?php echo htmlspecialchars($usuario->get_Nombre()); ?></td>
            <td><?php echo htmlspecialchars($usuario->get_Contraseña()); ?></td>
            <td><?php echo htmlspecialchars($usuario->get_Rol()); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
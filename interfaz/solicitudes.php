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
            <th>Rol</th>

        </tr>
        <?php foreach ($usuarios as $usuario): 
            ?>
        <tr>
            <td><?php echo htmlspecialchars($usuario->get_IdPendiente()); ?></td>
            <td><?php echo htmlspecialchars($usuario->get_Nombre()); ?></td>
            <td><?php echo htmlspecialchars($usuario->get_Contraseña()); ?></td>
            <td>
                <select name="rol">
                    <option value="Alumno" selected>Alumno</option>
                    <option value="Profesor">Profesor</option>
                    <option value="Admin">Admin</option>

                </select>
            </td>
            <td><button>Aceptar</button><button>Rechazar</button></td>
        </tr>
        

        <?php endforeach; ?>
    </table>
</body>
</html>

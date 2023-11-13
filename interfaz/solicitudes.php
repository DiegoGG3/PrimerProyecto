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
            <td id=<?php echo ($usuario->get_IdPendiente()); ?> ><?php echo ($usuario->get_IdPendiente()); ?></td>
            <td><?php echo ($usuario->get_Nombre()); ?></td>
            <td><?php echo ($usuario->get_Contraseña()); ?></td>
            <td>
                <select name="rol">
                    <option value="Alumno" selected>Alumno</option>
                    <option value="Profesor">Profesor</option>
                    <option value="Admin">Admin</option>

                </select>
            </td>
            <td>
                <button id="aceptar" onclick='aceptarUser(this)'>Aceptar</button>
                <button id="rechazar" onclick='rechazarUser(this)'>Rechazar</button>
            </td>
        </tr>
        

        <?php endforeach; ?>
    </table>
<script src='api/apiAceptar.js'></script>
</body>
</html>

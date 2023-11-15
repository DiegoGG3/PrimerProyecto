<?php
$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();

$examenes = BDRepository::selectUniversal($conexion, 'Examen');
$alumnos = userRep::devolverUsuarioRol($conexion,'Alumno');
?>

<!DOCTYPE html>
<html>
<head>
    <script src='api/apiAsignarExamen.js'></script>

    <title>Lista de Examenes</title>
</head>
<body>
    <table>
        <tr>
            <th>Número Examen</th>
            <th>Fecha Creacion</th>
        </tr>
        <?php foreach ($examenes as $examen): 
            ?>
        <tr>
            <td id="<?php echo ($examen->get_id()); ?>">Examen : <?php echo ($examen->get_id()); ?></td>
            <td><?php echo ($examen->get_Fecha()); ?></td>
            <td>
                <select name="Alumno">
                    <?php foreach ($alumnos as $alumno): ?>
                        <option value="<?php echo ($alumno->get_Id()); ?>"><?php echo ($alumno->get_Nombre()); ?></option>
                    <?php endforeach; ?>
                </select>

            </td>
            <td>
                <button class="asignar" onclick='asignarExamen(this)'>Asignar</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>

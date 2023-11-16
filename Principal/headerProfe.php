<?php 
if(isset($_GET['operacion']) && $_GET['operacion'] === 'CierraSesion'){
    loginRepository::cierraSesion();
    header("location: index.php");
}
?>



    <div id="titulo">
        <img src="./css/imagenes/logo.jpg" alt="Logo de la autoescuela"> 
        <a class="inicio" href="index.php">Autoescuela Las Fuentezuelas</a>
        <label>Hola <?php echo $_SESSION["user"]->get_Nombre() ?></label>    </div>

    <nav class="barra-navegacion">

            <ul class="lista-enlaces">
                <li class="enlace">
                    <a href="?menu=crearPregunta">Crear Pregunta<span class="oculto"></span></a>
                </li>
                <li class="enlace">
                    <a href="?menu=CrearExamen">Crear examen<span class="oculto"></span></a>
                </li>
                <li class="enlace">
                    <a href="?menu=ListaExamen">Lista examen<span class="oculto"></span></a>
                </li>
                <li class="enlace">
                    <a href="?menu=AsignarExamen">Asignar examen<span class="oculto"></span></a>
                </li>
                <li class="enlace">
                    <a href="?operacion=CierraSesion">Cerrar Sesión<span class="oculto"></span></a>
                </li>
            </ul>
            
    </nav>

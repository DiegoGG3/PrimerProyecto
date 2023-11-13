<?php 
if(isset($_GET['operacion']) && $_GET['operacion'] === 'CierraSesion'){
    loginRepository::cierraSesion();
    header("location: index.php");
}
?>

<header>
    <div id="titulo">
        <a class="inicio" href="index.php">Autoescuela Las Fuentezuelas</a>
    </div>

    <nav class="barra-navegacion">

            <ul class="lista-enlaces">
                <li class="enlace">
                    <a href="?menu=Examen">Realizar Examen<span class="oculto"></span></a>
                </li>
                <li class="enlace">
                    <a href="?menu=Conocenos">Quienes Somos<span class="oculto"></span></a>
                </li>
                <li class="enlace">
                    <a href="?operacion=CierraSesion">Cerrar Sesión<span class="oculto"></span></a>
                </li>
            </ul>
            
    </nav>
</header>

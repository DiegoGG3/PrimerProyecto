<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        require_once 'index.php';
    }
    if ($_GET['menu'] == "login") {
        require_once './Vistas/Login/autentifica.php';
    }
    if ($_GET['menu'] == "cerrarsesion") {
        require_once './Vistas/Login/cerrarsesion.php';
     
    }
    if ($_GET['menu'] == "Examen") {
        require_once './interfaz/examen.html';
     
    }
    if ($_GET['menu'] == "IniciaSesion") {
        header("location: ./interfaz/iniciarSesion.php");
     
    }
    if ($_GET['menu'] == "listadovacunas") {
        require_once './Vistas/Mantenimiento/listadovacunas.php';
     
    }

    

    
}

    
    //Añadir otras rutas
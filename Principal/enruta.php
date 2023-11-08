<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        require_once './Principal/layout.php';
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
    if ($_GET['menu'] == "Oferta") {
        require_once './interfaz/oferta.php';
     
    }
    if ($_GET['menu'] == "iniciarSesion") {
        require_once './interfaz/iniciarSesion.php';
     
    }
    if ($_GET['menu'] == "Conocenos") {
        require_once "./interfaz/conocenos.php";
    }

    if ($_GET['menu'] == "ListaUsuario") {
        require_once "./interfaz/listaUsuarios.php";
    }

    if ($_GET['menu'] == "Solicitudes") {
        require_once "./interfaz/solicitudes.php";
    }
    

        
}

    

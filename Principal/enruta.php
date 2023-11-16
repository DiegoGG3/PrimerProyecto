

<main>
<div id="cuerpo">

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
        require_once './interfaz/examen.php';
     
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

    if ($_GET['menu'] == "Registro") {
        require_once "./interfaz/registrarse.php";
    }
    
    if ($_GET['menu'] == "CrearExamen") {
        require_once "./interfaz/CrearExamen.php";
    }

    if ($_GET['menu'] == "AsignarExamen") {
        require_once "./interfaz/AsignarExamen.php";
    }

    if ($_GET['menu'] == "ListaExamen") {
        require_once "./interfaz/ListaExamen.php";
    }

    if ($_GET['menu'] == "crearPregunta") {
        require_once "./interfaz/crearPregunta.php";
    }
}
?>
</div>
</main>


    

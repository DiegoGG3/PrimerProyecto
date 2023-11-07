<header>
        <?php

            loginRepository::iniciarSesion();
            //COMPROBAR SI EXISTE SESSION
            if(!loginRepository::estaLog()){
                require_once 'headerNoLog.php';
            }else{
                switch (strtoupper(loginRepository::comprobar("user")->get_Rol())) {
                case "ADMIN":
                    require_once 'adminHeader.php';
                    break;
                case "ALUMNO":
                    require_once 'headerAlumno.php';

                    break;
                case "PROFESOR":
                    require_once 'teacherHeader.php';
                    break;
                }
            }
        ?>
</header>
<?php
    //**Desarollo */
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    //**Desarollo */

    //Ruta de la aplicacion
    define('RUTA_APP', dirname(dirname(__FILE__)));

    //Ruta url
    define('RUTA_URL', 'http://localhost/orientacion');

    define('NOMBRE_SITIO', 'Web de orientacion ');

    //Configuración de la Base de Datos
    define('DB_HOST', 'localhost');
    define('DB_USUARIO', 'root');
    define('DB_PASSWORD', 'Salamence!3');
    define('DB_NOMBRE', 'orientacion');
<?php 
/*conectarme a la base de datos con funciones */

require_once('./config.php');


//programacion funcional
function conectarbase(){
    //parametros del archivo config.php para conectarme a la base de datos
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ( !$conn ) { /* !$conn = es falso*/

        //dar error en cual fue el error
        //die = mensaje de muerte
        die("conexion fallida: ".mysqli_connect_error());
    }
    //retornar la conexion
    return $conn;

}






?>












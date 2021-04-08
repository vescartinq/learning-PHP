<!-- Conexión a DB -->
<?php

// Iniciamos sesión en la base de datos
session_start();


$conn= mysqli_connect(
    'localhost',
    'root',
    '',
    'php_mysql_crud'
);

// SI CONECTADO-> IMPRIMIR

// if(isset($conn)) {
//     echo 'DB is connected';
// }

?>
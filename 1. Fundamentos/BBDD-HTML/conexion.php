<?php

$link = 'mysql:host=localhost;dbname=bluuweb_colores';
$usuario = 'victor';
$pass = 'victor';

try {
    
    $pdo = new PDO($link,$usuario,$pass);
    
    // echo 'Now you are Connected!<br><br>';

    // foreach($pdo->query('SELECT * FROM `colores`') as $fila) {
    //     print_r($fila);
    // }
    
}catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
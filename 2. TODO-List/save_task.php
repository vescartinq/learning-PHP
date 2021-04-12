<?php

include("db.php");

// Si POSt de tarea
if (isset($_POST['save_task'])){
    $title=$_POST['title'];
    $description=$_POST['description'];
    // echo $title; -> console.log
    // echo $description;

    $query="INSERT INTO task(title,description) VALUES ('$title', '$description')";
    $result=mysqli_query($conn, $query);

    // Si falla
    if (!$result) {
        // Termina la aplicación mostrando mensaje (return)
        die("Query Failed");
    }

    // Almacenar en DB una tarea y mensaje para usuario
    $_SESSION['message']= 'Task saved succesfully';
    $_SESSION['message_type']= 'success';


    // Si guarda, redirecciona al usuario a index.php
    header("Location: index.php");
}

?>
<?php

    include("db.php");

    // RECIBIR LA INFORMACIÓN DE DB
    if (isset($_GET['id'])) {
        // Localiza ID de la tarea
        $id = $_GET['id'];
        
        // Selecciona en la DB todo de la tarea con ese id
        $query = "SELECT * FROM task WHERE id=$id";
        $result = mysqli_query($conn, $query);

        // Si devuelve un resultado, guarda titulo y descripción
        if (mysqli_num_rows($result)==1) {
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
        }
    }

    // ENVIAR LA INFO ACTUALIZADA A DB
    if (isset($_POST['update'])) {
        // Localiza ID de la tarea
        $id = $_GET['id'];
        // Localiza las modificaciones realizadas
        $title= $_POST['title'];
        $description = $_POST['description'];
      
        // Modifica la información en la tarea que coincida con el id indicado
        $query = "UPDATE task set title = '$title', description = '$description' WHERE id=$id";
        mysqli_query($conn, $query);
        $_SESSION['message'] = 'Task Updated Successfully';
        $_SESSION['message_type'] = 'warning';
        
        // Redirecciona a la página principal
        header('Location: index.php');
      }

?>

<!-- FORMULARIO PARA EDITAR TASK -->
<?php include('includes/header.php'); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <!-- Formulario pintado con los datos recibido por id -->
                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input name="title" type="text" class="form-control" value="<?php echo $title; ?>"
                            placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" cols="30"
                            rows="10"><?php echo $description;?></textarea>
                    </div>
                    <button class="btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
<?php include("db.php") ?>

<!-- Codigo header cortado e incluido en otro archivo -->
<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <!-- ALERTAS -->
            <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <!-- Muestra desde SESSION el mensaje guardado -->
                <?= $_SESSION['message'] ?>
                <!-- Botón para cerrar -->
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Al ejecutarse, limpia los datos de sesión -->
            <?php session_unset(); } ?>

            <!-- FORMULARIO PARA GUARDAR TAREA -->
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control"
                            placeholder="Task description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save task">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Recuperar todas las tareas almacenadas y pintarlas -->
                    <!-- Mientras hayan tareas, una fila por recorrido -->
                    <?php
                    $query="SELECT * FROM task";
                    $result_tasks=mysqli_query($conn,$query);

                    while($row= mysqli_fetch_array($result_tasks)){?>
                    <tr>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['created_at'] ?></td>
                        <!-- Crea boton editar enlazando al id de cada tarea -->
                        <td>
                            <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                            </a>
                            <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>
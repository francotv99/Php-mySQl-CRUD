<?php //Llama a db.php 
//para la conecion a la base de datos?>
<?php include("db.php")?>
<?php include("includes/header.php")  ?>
 
<div class="container p-4">
    <div>
        <div class="row">


        <!--LLenado de la consulta-->
            <div class="col-md-4">

            <?php if(isset($_SESSION['message'])){?>
                    <div class="alert alert-<?= $_SESSION['message-type'];?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php  session_unset();}?>

                <div class="card card-body">
                    <form action="save-task.php"method="POST">
                    <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Task Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
                    </div>
                    <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Task Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>
                            <input type="submit" class="btn btn-success btn-block" name="save-task" value="Save Task">

                    </form>
                </div>
            </div>

            <!--Muestra del llenado del formulario-->
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
                        <?php
                            $query="SELECT * FROM task";
                            $result_tasks=mysqli_query($conn,$query);
                            while($row=mysqli_fetch_array($result_tasks)){?>

                                <tr>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td><?php echo $row['created_ad'] ?></td>
                                    <td>
                                            <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                                    <i class="material-icons">create</i>
                                            </a>
                                            <a href="delete-task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                                    <i class="material-icons">delete</i>
                                            </a>
                                    </td>

                                </tr>
                                

                        
                        
                        <?php  }?>
                    </tbody>

                </table>

            </div>
        </div>

    </div>
 
</div>

    


<?php include("includes/footer.php")  ?>

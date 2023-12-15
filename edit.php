<?php
    include("db.php");

    if(isset($_GET['id'])){

        $id=$_GET['id'];
        $query="SELECT * FROM task WHERE id=$id";

        $result=mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result)==1)
        {
            
            $row=mysqli_fetch_array($result);
            $title=$row['title'];
            $description=$row['description'];

        }

    }
    if (isset($_POST['update']))
    {
        $id =$_GET['id'];
        $title=$_POST['title'];
        $description=$_POST['description'];

        //echo $title;
        //echo $descri;
        $query="UPDATE task set title='$title', description='$description' WHERE id=$id";
        mysqli_query($conn,$query);

        $_SESSION['message']='Task Update right';
        $_SESSION['message-type']='info';

        header("Location:index.php");
    }
 
?>

<?php include ("includes/header.php")?>
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Task Title Edit</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="<?php echo $title;?>">
                    </div>
                    <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Task Description Edit</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">
                                <?php echo $description;?>
                            </textarea>
                    </div>
                            <button type="submit" class="btn btn-success btn-block" name="update" value="Save Task">
                                Update</button>

                    </form>
                </div>
<?php include ("includes/footer.php")?>
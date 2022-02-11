<h2>Create New Post Photo</h2>
<hr>

<?php
if(isset($_POST['create_post_photo'])){
    

    $photo = $_FILES['photo']['name'];
    $post_temp_image = $_FILES['photo']['tmp_name'];
    $title_photo = escape($_POST['title_photo']);
    

    $location = "../photo/$photo";
    move_uploaded_file($post_temp_image,$location);

    $query = "INSERT INTO photo (photo,title_photo)";
    $query .= "VALUES(?,?)";

    $stmt_create_post_query = mysqli_prepare($connection,$query);
    mysqli_stmt_bind_param($stmt_create_post_query,"ss",$photo,$title_photo);
    mysqli_stmt_execute($stmt_create_post_query);
    mysqli_stmt_close($stmt_create_post_query);

    confirm_query($stmt_create_post_query);

    header("location:posts.php");

}

?>


<form action="" method="POST" enctype="multipart/form-data">
   

    <div class="form-group col-sm">
        <label for="photo">Post Photo</label>
        <input type="file" class="form-control-file" name="photo">
    </div>

     <div class="form-group col-sm-3">
        <label for="title_photo">Post title Photo</label>
        <input type="text" class="form-control" name="title_photo" >
    </div>


    <div class="form-group col-sm">
        <input type="submit" class="btn btn-secondary " name="create_post_photo" value="Publish Post" >
    </div>
</form>
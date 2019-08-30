<?php
require_once "User.php";

$user_id = $_GET['user_id'];

$user = new User;

$get_one_user = $user->getOneUser($user_id);

if(isset($_POST['save'])){
    $directory = "uploads/";
    $target_file = basename($_FILES['profile_picture']['name']);
    $tmp_name = $_FILES['profile_picture']['tmp_name'];

    $add_user_photo = $user->addUserPhoto($user_id, $directory, $target_file, $tmp_name);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <div class="card mt-5">
        <div class="card-header">
            <h3>Upload a Photo</h3>
        </div> 
        <div class="card-body">
            <?php
            if(isset($add_user_photo)){
                echo "<p class='text-danger text-center'>$add_user_photo</p>";
            }
            ?>
                
            <form method="post" enctype="multipart/form-data" class="text-center">
                <div class="form-group">
                    <label>Select a Photo:</label>
                    <input type="file" name="profile_picture">
                </div>
                <button name="save" class="btn btn-primary">Upload Photo</button>

            
            </form>
        </div>   
    </div>
</div>
    
</body>
</html>
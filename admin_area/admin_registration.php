<?php 
    include('../includes/conneect.php');
    include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

     <!--bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous"> -->

    <!-- font awesome link-->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />

    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminreg.jpg" alt="Admin Registration" class="img-fluid">
            </div>

            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required="required" class="form-control">
                    </div>

                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1 ">Do you already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
    if(isset($_POST['admin_registration'])){
        $admin_username=$_POST['username'];
        $admin_email=$_POST['email'];
        $admin_password=$_POST['password'];
        $hash_password=password_hash( $admin_password, PASSWORD_DEFAULT);
        $conf_admin_password=$_POST['confirm_password'];


        //select query
        $select_query = "Select * from `admin_table` where admin_name='$admin_username' or admin_email='$admin_email' ";
        $result=mysqli_query($con, $select_query);
        $rows_count=mysqli_num_rows($result);
        if($rows_count>0){
            echo "<script>alert('Username and email already exist')</script>";
        }else if($admin_password!=$conf_admin_password){
            echo "<script>alert('Passwords do not match')</script>";
        }else{
            //insert query
            $insert_query="insert into `admin_table` (admin_name, admin_email, admin_password)
            values ('$admin_username','$admin_email','$hash_password')";
            $sql_execute=mysqli_query($con, $insert_query);
        }
        
    }
?>
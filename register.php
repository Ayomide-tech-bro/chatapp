<?php   
    require_once ("user/includes/functions.php");
$first_name = null;
$last_name  = null;
$email      = null;
$gender     = null;
$password   = null;
$msg        = null;

if (isset($_POST['submit'])) {
    $my_conn = mysqli_connect('localhost','root','','chat_app');
  
    
    $first_name = sanitize_var($my_conn, $_POST['first_name']);
    $last_name  = sanitize_var($my_conn, $_POST['last_name']);
    $email      = sanitize_var($my_conn, $_POST['email']);      
    $gender     = sanitize_var($my_conn, $_POST['gender']);   
    $password   = sanitize_var($my_conn, $_POST['password']);   
    $c_password = sanitize_var($my_conn, $_POST['c_password']);

     // check for password match
     if ($password===$c_password) { 
        

       

         // check if the email is already registered
        $query = "SELECT id FROM users WHERE email=?";
        $stmt = mysqli_prepare($my_conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $n_row1 = mysqli_num_rows($result);

        if ($n_row1 > 0) {
                $msg .='This email already exist with us login if you are member';
         
        } else {  

        $sql = "INSERT INTO users (first_name,last_name,email,gender,password) VALUES (? , ?, ? , ? , ?)";
        $stmt = mysqli_prepare($my_conn, $sql);
        mysqli_stmt_bind_param($stmt , "sssss" , $first_name,$last_name, $email, $gender, $password );
        mysqli_stmt_execute($stmt);  
        $n_row2 = mysqli_stmt_affected_rows($stmt);
        if ($n_row2 > 0) {
        $msg .= 'Registration successfull';
        } else {
        $msg .= 'Something went wrong, pls try again!';
        }      

     }       

   }    else {
              $msg .='Password does not match!';
        
     

    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <title>REGISTER PAGE</title>
    <style>
        /* .sdd{background-image:url(image/macbook-pro-2021-16.webp);
        background-size: cover;} */

        .wh{background-color:tan ;}
        .box{
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
        }
    </style>



</head>
<body class="sdd text-light">
       
           
   

      <form action="" method="post" class="col-12 form">
      
    <div class="col-sm-7 col-lg-5 mx-auto mt-2 p-3 rounded-4 box">
        <h4 class="text-center bg-secondary p-3 text-white rounded">Chat App</h4>
        
        <h6 class="text-center">Fill in the fields below with the accurate information</h6>
        
        <?php
         if (!$msg=='') { echo '<div class="alert alert-secondary">'.$msg.'</div>' ; }
         ?>
       
                 <div class="col-sm-12">
                                <div class="mb-2">
                                    <label class="form-label">First name</label>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                          </div>
                          <div class="col-sm-12">
                                <div class="mb-2">
                                     <label class="form-label">Last name</label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>
                          </div>
                          <div class="col-sm-12">
                          <div class="mb-2">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                          </div>
                          
                          <div class="col-sm-12">
                                <div class="mb-2">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" id="" class="form-select" required>
                                    <option value="male"></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                          </div>
                          <div class="col-sm-12">
                                <div class="mb-2">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                          </div>
                          <div class="col-sm-12">
                                <div class="mb-2">
                                    <label for="" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="c_password" required>
                                </div>
                          </div>

            <div class="form-group col-12 text-center">
           <button class="btn btn-secondary  col-5 text-light " type="clear">Clear</button>
            
            <button class="btn col-5 align-item-center btn-primary " name="submit" type="submit">Sign up</button>

            <h6 class="text-light text-center mb-2">Already a member? <a href="login.php">log in</a></h6>
            </div>



       
    </div>
    </form>










</body>
</html>
<?php
//db
require 'config.php';

// vars email and password.
$email = $password = '';
$email_err = $password_err = '';

if($_SERVER["REQUEST_METHOD"]=="POST" ){
   
    $input_email= trim($_POST['username']);
    $input_password = trim($_POST['password']);
    // 
    if(!empty($input_email)){
        $email =$input_email;
    }else{
        $email_err = "error empty field";
    }
    // 
    if(!empty($input_password)){
        $password = $input_password;
    }else{
        $password_err = "empty field error";
    }

    // prepare sql statement 
    // SELECT `id`, `first_name`, `last_name`, `email`, `password`, `joined` FROM `users` WHERE 1
    $sql ="SELECT `id`,`first_name`,`email`,`password` FROM `users` WHERE email=? ";
        $stmt = $conn ->prepare($sql);
          $stmt ->bind_param('s',$email);
             if($stmt -> execute()){
                $stmt ->store_result();
                if($stmt ->num_rows() ==1){
                    // check password:
                    $stmt ->bind_result($id,$username,$email,$hashed_password);
                    if($stmt->fetch()){
                         if(password_verify($password,$hashed_password)){
                             session_start();

                            $_SESSION['loggedin'] = true ;
                            $_SESSION['username'] = $username;
                            $_SESSION['email'] = $email;

                            header('location:dashboard.php');
                         }else{
                             echo "wrong password";
                         }
                    }
                }else{
                    echo "username doesn't exist";
                }
             }else{
                 echo "error.$conn->error";
             }
          

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<link rel="stylesheet" href="../vendor/bootstrap-5.0.1-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../vendor/fontawesome/css/all.min.css">
<link rel="stylesheet" href="../style.css">
<style>
    
.login .c-div {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}

.login form {
  background: color #f1f1f1;
  width: 40%;
  -webkit-box-shadow: 0px 4px 8px 1px rgba(0, 0, 0, 0.2);
          box-shadow: 0px 4px 8px 1px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
}

.login h3 {
  font-weight: bold;
  color: gray;
}

</style>
<body>
<section class="p-5 login">
    <div class="container p-5"></div>
        <div class="c-div text-center">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-group p-3" method="POST"> 
                 <h3 class="text-center p-3">login</h3>
                 <div class="alert alert-info alert-dismissable">
                     <i class="fa fa-info"></i>
                   <span class="text-info text-center px-3">your username is your email address</span>
                 </div>
                <div class="input-group">
                   <div class="input-group-prepend">
                    <i class="fa fa-user input-group-text"></i>
                   </div>
                    <input type="text" id="na_me" class="form-control" name="username" placeholder="username">

                </div>
                <br>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <i class="fa fa-lock input-group-text"></i>
                  </div>
                    <input type="password" id="pass" class="form-control" name="password" placeholder="password">
                </div>
                <br>
                <div class="text-end">
                    <button class="btn btn-primary" id="rg_btn">
                        login 
                    </button>
                </div>
                <div class="text-start text-muted p-1">
                    <small class="text-muted"><a href="authors.php" class="text-primary">forgot password</a></small>
                </div>
                <div class="text-center text-muted p-3">
                    <small class="text-muted">Not registered? <a href="authors.php" class="text-primary">register</a></small>
                </div>
            </form>
        </div>
    </div>
</section>
</body>
<script src="vendor/bootstrap-5.0.1-dist/js/bootstrap.bundle.js"></script>
</html>
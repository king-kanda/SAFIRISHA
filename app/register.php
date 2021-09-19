<?php
// db connect
  require 'config.php';
  
  
// vars fname lname email and pass
$fname = $lname = $email = $pass = $conPass = '';
$fname_err = $lname_err = $email_err = $pass_err ='';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    // fisrt name
    $input_fname = trim($_POST['fname']);
    if( empty($input_fname) ){
       $fname_err = "error";
    }else{
        $fname = $input_fname;
    }
    // last name
    $input_lname = trim($_POST['lname']);
    if( empty($input_lname) ){
       $lname_err = "error";
    }else{
        $lname = $input_lname;
    }
    // email
    $input_email = trim($_POST['email']);
    if( empty($input_email) ){
       $email_err = "error";
    }else{
        $email = $input_email;
        // validate if same email does exist.
    }
    // password
    $input_pass = trim($_POST['password']);
    if( empty($input_fname) ){
       $pass_err = "error";
    }else{
       $con_pass = trim($_POST['confirm']);
       if($con_pass === $input_pass){
           $pass = $input_pass ;
       }else{
           echo " passwords dont match";
       }
    }

 if(  empty($lname_err) && empty($fname_err) && empty($pass_err) && empty($email_err) ){
    // prepare sql statements.
        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`)  VALUES (?,?,?,?)";
        $stmt = $conn ->prepare($sql);
        // check if connection is established.
        if($stmt === false){
            echo "something went wrong.$conn->error";
        }else{
            $stmt -> bind_param('ssss',$fname,$lname,$email,$password);
            $password = password_hash($pass,PASSWORD_DEFAULT);
            if($stmt -> execute()){
                header('location:login.php');
                exit();
            }else{
                echo "an error occured.$stmt->error";
            }
        }
   }
   else{
       echo "an error occured";
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
<link rel="stylesheet" href="../assests/style.css">

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
    <div class="container p-2"></div>
        <div class="c-div ">
          
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-group p-3" method="POST"> 
                 <h3 class="text-center ">Register</h3>
                <div class="group">
                    <label for=""> Fisrt name</label>
                    <input type="text" class="form-control" placeholder="fisrt name" name="fname" id="fname">
                </div>
                <br>
                <div class="group">
                    <label for=""> last name</label>
                    <input type="text" class="form-control" placeholder="last name" name="lname" id="fname">
                </div>
                <br>
                <div class="group">
                    <label for=""> email</label>
                    <input type="email" class="form-control" placeholder="email address" name="email" id="email">
                </div>
                <br>
                <div class="group">
                    <label for=""> password</label>
                    <input type="password" class="form-control" placeholder="password" name="password" id="password">
                </div>
                <br>
                <div class="group">
                    <label for=""> confirm password</label>
                    <input type="password" class="form-control" placeholder="password" name="confirm" id="c-p">
                </div>
                

                <br>
               
                <br>
                <div class="text-end">
                    <button class="btn btn-primary">
                        register
                    </button>
                </div>
                <div class="text-center text-muted p-3">
                    <small class="text-muted">registered? <a href="login.php" class="text-primary">Sign in</a></small>
                </div>
            </form>
        </div>
    </div>
</section>
</body>
<script src="vendor/bootstrap-5.0.1-dist/js/bootstrap.bundle.js"></script>
<script src="app/script.js"></script>
</html>
<?php
  session_start();

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true  ){
    header('location:login.php');
    exit;
    }
  require 'config.php';

  $name = $_SESSION['username'];

  $sql = "SELECT COUNT(*) FROM post";
  $stmt = $conn->prepare($sql);
  $stmt -> execute();
  $result = $stmt->get_result()->fetch_assoc();

  $sql = "SELECT COUNT(*) FROM users";
  $stmt = $conn->prepare($sql);
  $stmt -> execute();
  $users = $stmt->get_result()->fetch_assoc();
 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/bootstrap-5.0.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
<section class="aside p-4 text-start">
    <h2 class="fw-bold text-center"><i class="fa fa-truck"></i>  safirisha.</h2>
    <hr>
     <div class="list-group list-group-flash bg-dark">
        <a class="list-group-item list-group-item-action-disabled" href="#"> <i class="fa fa-home"></i> Dashboard</a>
        <a class="list-group-item list-group-item-action" href="#"> <i class="fa fa-cog"></i> Manage site</a>
        <a class="list-group-item list-group-item-action" href="#"> <i class="fa fa-user"></i> clients</a>
        <a class="list-group-item list-group-item-action" href="blog.php"> <i class="fa fa-pen-alt"></i> Press</a>
        <a class="list-group-item list-group-item-action" href="blog.php"> <i class="fa fa-eye"></i> public</a>
     </div>
</section>
<section class="navigation p-1">
   <div class="container">
        <nav class="nav navbar d-flex fixed-top bg-light align-items-center justify-content-end mb-2" style="margin-left: 20%;">
            <div class="alerts p-2">
                <a href="#" class="fa fa-envelope"></a><span class="badge rounded-pill bg-danger">3</span>
                <a href="#" class="fa fa-bell"></a><span class="badge rounded-pill bg-danger">7</span>
            </div>
            <div class="dropdown dropstart">
                <img src="../img/alexander-krivitskiy-RgoJtqRDuGA-unsplash-min.jpg" alt="pro-pic" class="pic dropdown-toggle" 
                id="dropdownimage" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownimage">
                        <li>
                            <a href="" class="dropdown-item"><i class="fa fa-cog fa-spin"></i> Account Settings</a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item" >purpose not found</a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li class="text-center"><a href="logout.php" class="dropdown-item">Log out</a></li>
                </ul>

            </div>
        </nav>
   </div>
</section>


<section class="main">
    <div class="container">
       <div class="dashboard ">
           <h3 class="fw-bold p-5">Welcome,<?php echo htmlspecialchars($_SESSION['username']); ?>.</h3>
           <div class="display px-5 row">
               <div class="col-3">
                   <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-item-center justify-content-start">
                                <i class="fa fa-user p-3"></i>
                                <div class="label px-3">
                                    <p class="text-muted">Users</p>
                                    <p class="fw-bold"><?php  echo ($users['COUNT(*)']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#">view all</a>
                        </div>
                   </div>
               </div>

               <div class="col-3">
                   <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-item-center justify-content-start">
                                <i class="fa fa-coins p-3"></i>
                                <div class="label px-3">
                                    <p class="text-muted">Clients</p>
                                    <p class="fw-bold">456</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="blog.php">view all</a>
                        </div>
                   </div>
               </div>

               <div class="col-3">
                   <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-item-center justify-content-start">
                                <i class="fa fa-pen-alt p-3"></i>
                                <div class="label px-3">
                                    <p class="text-muted">Blogs</p>
                                    <p class="fw-bold"><?php  echo ($result['COUNT(*)']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="blog.php">view all</a>
                        </div>
                   </div>
               </div>

               <div class="col-3">
                   <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-item-center justify-content-start">
                                <i class="fa fa-clipboard-check p-3"></i>
                                <div class="label px-3">
                                    <p class="text-muted">Orders</p>
                                    <p class="fw-bold">164</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#">view all</a>
                        </div>
                   </div>
                </div>    
           </div>
       </div>
    </div>
</section>


</body>
<script src="../vendor/bootstrap-5.0.1-dist/js/bootstrap.bundle.js"></script>
</html>
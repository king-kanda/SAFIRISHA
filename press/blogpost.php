<?php
  require_once '../app/config.php';

//   select blogs
   if(isset($_GET['id'])){
    //    run query to find the posts
        $id = $_GET['id'];
        $sql = " SELECT * FROM `post` where id = $id ";
        $stmt = $conn -> prepare($sql);
        if($stmt == true){
            $stmt -> execute();
            $result = $stmt ->get_result() -> fetch_all(MYSQLI_ASSOC);
            foreach($result as $blog){
                
            }
        }   
    }else{
        header('location:index.php');
        exit();
    } 
    // aside
    $sql = "SELECT `id`, `name`, `email`, `title`, `topic`, `content`, `date`, `img` FROM `post`  LIMIT 2" ;
    $stsm = $conn ->prepare($sql);
    if ($stsm === false){
        echo "an error occured.$conn->error";
    }else{
    $stsm ->execute();
    // dump blogs into an array
    $posts = $stsm ->get_result() ->fetch_all(MYSQLI_ASSOC);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $blog['title'] ?>
    </title>
    <link rel="stylesheet" href="../vendor/bootstrap-5.0.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assests/style.css">
</head>
<style>
   
    .card{
        box-shadow: 0p 4px 4px 2px rgba(0,0,0,0.1);
        border: none;
    }
</style>
<body>
    <section class="about-navigation ">
       
        <nav class="navbar navbar-expand-lg bg-light  fixed-top ">
            <div class="container">
            <a href="#" class="navbar-brand text-bold">
                SAFIRISHA
            </a>
            <button class="navbar-toggler btn" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="fa fa-bars"></span>
            </button>
                <div class="collapse  text-center navbar-collapse ml-auto justify-content-end" id="navbar-menu">
                    <ul class="navbar-nav text-bold">
                        <ll class="navbar-item">
                            <a href="index.html" class="nav-link">Home</a>
                        </ll>
                        <ll class="navbar-item">
                            <a href="about.html" class="nav-link">About Us</a>
                        </ll>
                        <ll class="navbar-item">
                            <a href="services.html" class="nav-link">Our Services</a>
                        </ll>
                        <ll class="navbar-item">
                            <a href="" class="nav-link">Press</a>
                        </ll>
                        <ll class="navbar-item">
                            <a href="#contact-us" class="nav-link">Contact Us</a>
                        </ll>
                        <ll class="navbar-item">
                            <a href="quote.html" class="nav-link btn btn-primary text-light">Get Quote</a>
                        </ll>
                    </ul>
                </div> </div>
        </nav>
            <div class="nav-cont">
                <div class="container">
                    <div class="nav-header">
                     <h3> <?php echo $blog['title'] ?>  </h3>
                  </div>
                  <div class="nav-text text-start">
                    <p class="text-light">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                      Quaerat commodi nam rem doloribus animi molestiae, quidem quibusdam ad nobis ratione, a corrupti earum. Esse, quis.
                    </p>
                  </div>
                </div>
      
             </div>
    
       
    </section>
    <!-- blog  -->
    <div class="row">
        <div class="col-sm-8">
            <section class="p-5 mb-3 blogpost">
                <div class="container">
                        <h3 class="fw-bold p-2">  <?php echo $blog['title'] ?>   </h3>
                        <P class="">  <?php echo $blog['content'] ?>   </P> 
                        
                        <div class="text-end">
                            <small class="text-muted"><i class="fa fa-calendar-alt"></i>  <?php echo $blog['date']   ?></small>
                            <br>
                            <small class="text-muted"> <i class="fa fa-feather"></i>  <?php echo $blog['name'] ?></small> 
                        </div>
                </div>
             </section> 
        </div>
        <div class="col-sm-4" style="background-color: #f1f1f1;">
            <div class="search-aside p-5 mb-3 ">
               <div class="container">
                    <form action="#" class="mb-3">
                      <div class="input-group">
                          <input type="search" name="search" id="search" placeholder="Search for an article" class="form-control">
                          <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                      </div>
                    </form>
                    <h6 class="fw-bold">Top Article</h6>
                    <!-- other posts -->
                    <?php foreach($posts as $more): ?>
                    <div class="card mb-3">
                         <img src="../img/<?php echo $more['img'] ?>" alt="" class="card-img">
                         <div class="card-body">
                            <h4 class="">
                             <?php echo $more['title'] ?>
                            </h4>
                             <hr class="card-line">
                            <a href="blogpost.php?id= <?php echo $more['id']  ?>" class="">Read More <i class="fa fa-chevron-right"></i></a>   
                        </div>                       
                     </div>
                    <?php endforeach; ?>
                    <a href="index.php" class="btn btn-primary">view more articles <i class="fa fa-chevron-right"></i></a>         
               </div>
            </div>
        </div>
    </div>
   
    <!-- aside for searches -->

 
</body>
<script src="../vendor/bootstrap-5.0.1-dist/js/bootstrap.bundle.js"></script>
<footer class="footer bg-dark p-2 text-light">
   <div class="container">
    <div class="fr p-5 row">
        <div class="col-sm-3">
            <h3 class="fw-bold">
                SAFIRISHA
            </h3>
        </div>
        <div class="col-sm-3">
            <ul class="navbar-nav">
                <li class="footer-item">
                  <a href="index.html" class="nav-link">  Home</a>
                </li>
                <li class="footer-item">
                  <a href="about.html" class="nav-link">  About us</a>
                </li>
                <li class="footer-item">
                   <a href="services.html" class="nav-link"> Services</a>
                </li>
                <li class="nav-link">
                    <a href="#" class="nav-link"> Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-3">
            <ul class="navbar-nav">
                <li class="footer-item">
                  <a href="careers.html" class="nav-link">  Careers</a>
                </li>
                <li class="footer-item">
                  <a href="#" class="nav-link">  Terms of use</a>
                </li>
                <li class="footer-item">
                   <a href="#" class="nav-link"> Privacy Policy</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-3">
            <h3 class="fw-bold">
                SAFIRISHA
            </h3>
        </div>
    </div>
   </div>
   <hr>
   <div class="text-center">
       <span class="text-muted">copyright okanda2021</span>
   </div>
</footer>
</html>    
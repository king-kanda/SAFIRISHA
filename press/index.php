<?php
  require_once '../app/config.php';

//   select blogs
$sql = "SELECT `id`, `name`, `email`, `title`, `topic`, `content`, `date`, `img` FROM `post`";
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
    <title>SAFIRISHA</title>
    <link rel="stylesheet" href="../vendor/bootstrap-5.0.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assests/style.css">
</head>
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
                            <a href="press.html" class="nav-link">Press</a>
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
                     <h3> Press Releases</h3>
                  </div>
                  <div class="nav-text text-start">
                    <p class="text-light">
                     Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor consequatur aut 
                     itaque reprehenderit7
                    
                    </p>
                  </div>
                </div>
      
              </div>
    
       
    </section>
    <section class="p-3 mb-4 realeses">
        <div class="container">
            <div class="row g-4">
               <?php foreach($posts as $post): ?>
                <div class="col-sm-3">
                     <div class="card">
                         <img src="../img/<?php echo $post['img'] ?>" alt="" class="card-img">
                         <div class="card-body">
                            <h4 class="fw-sm-bold p-text" >
                             <?php echo $post['title'] ?>
                            </h4>
                            <!-- string substring stuff  substr($string,offset(start from where),length( number of characters)) -->
                            <p class="card-text p-text" > <?php echo substr($post['content'],0,50)."...."    ?> </p>

                            <div class="text-end">
                                <small class="text-muted"><i class="fa fa-feather"></i> <?php echo $post['name'] ?> </small>
                            </div>
                             <hr class="card-line">
                            <a href="blogpost.php?id= <?php echo $post['id']  ?>" class="">Read More <i class="fa fa-chevron-right"></i></a>   
                        </div>                       
                     </div>
                </div>
                <?php endforeach; ?> 
             </div>
        </div>
    </section>
   

    
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
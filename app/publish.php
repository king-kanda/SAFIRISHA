<?php
session_start();
if(!isset($_SESSION) && isset($_SESSION['loggedin']) !==true){
    header('location:login.php');
    exit();
}
require 'config.php';
//form values
if($_SERVER["REQUEST_METHOD"]=="POST"){
        
    $title = $topic = $content ='';
    $t_err = $P_err = $conn_err ='';

    $input_title = trim($_POST['title']);
    $input_topic = trim($_POST['topic']);
    $input_content = trim($_POST['content']);
    $blog_image = $_FILES['image'];
    // the file type has a variety of values and keys 

    if(!empty($input_title)){
        $title =$input_title;
        var_dump($title);
    }else{
        $t_err = "error";
    }

    if(!empty($input_topic)){
        $topic =$input_topic;
        var_dump($topic);
    }else{
        $P_err = "error";
    }

    if(!empty($input_content)){
        $content =$input_content;
       
    }else{
        $conn_err = "error";
    }

    //procced with no form errors.
    if( empty($t_err) && empty($P_err) && empty($conn_err) ){
        // image processing
        
        $image_name = time(). '_'.$_FILES['image']['name'];
        $image_dest = "../img/".$image_name;
        $img_bool =move_uploaded_file($_FILES['image']["tmp_name"],$image_dest);
        if($img_bool === true){
            echo ("image saved");
        }else{
            echo ("error");
        }

        // insert
        // INSERT INTO `post`(`id`, `name`, `email`, `title`, `topic`, `content`, `date`, `img`) 
        // VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')
        $sql = " INSERT INTO `post`( `name`, `email`, `title`, `topic`, `content`,`img`)  VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
                if($stmt === false){
                    echo "an error occured.$conn->error";
                }else{
                    $stmt ->bind_param('ssssss',$name,$email,$title,$topic,$content,$image_name);
                    $name = $_SESSION['username'];
                    $email = $_SESSION['email'];
                    if($stmt -> execute()){
                        header('location:blog.php');
                        exit();
                    }else{
                        echo "an error occured.$conn->error_log";
                    }
                }
    }else{
        echo "a form field was empty";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/bootstrap-5.0.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome/css/all.min.css">
    <script src="../vendor/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <section class="aside p-4">
        <h2 class="fw-bold text-center"><i class="fa fa-truck"></i>  safirisha.</h2>
        <hr>
        <div class="list-group list-group-flash bg-dark">
            <a class="list-group-item list-group-item-action-disabled" href="#"> <i class="fa fa-home"></i> Dashboard</a>
            <a class="list-group-item list-group-item-action" href="#"> <i class="fa fa-cog"></i> Manage site</a>
            <a class="list-group-item list-group-item-action" href="#"> <i class="fa fa-user"></i> clients</a>
            <a class="list-group-item list-group-item-action" href="blog.php"> <i class="fa fa-pen-alt"></i> Press</a>
        </div>
    </section>
    <section class="navigation p-1">
    <div class="container">
            <nav class=" mb-3 nav navbar d-flex fixed-top bg-light align-items-center justify-content-end mb-2" style="margin-left: 20%;">
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


    <section class="main p-2">
        <div class="container">
        <div class="publish p-5">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-group" enctype="multipart/form-data" >
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="title">Blog title</label>
                            <input type="text" name="title" placeholder=" blog title" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="topic">topic</label>
                        <select name="topic" id="topic" class="form-control dataselect">
                            <option value="topic1">topic1</option>
                            <option value="topic2">topic2</option>
                            <option value="topic3">topic3</option>
                            <option value="topic4">topic4</option>
                            <option value="topic5">topic5</option>
                        </select>
                        </div>
                    </div>
                    <div class="blog-text mb-3">
                        <label for="content">blog content</label>
                        <textarea class="textarea form-control" name="content" id="blog_content" cols="30" rows="10">

                        </textarea>
                        <script>
                            CKEDITOR.replace('blog_content');
                        </script>
                    </div>
                    <div class="btm d-flex align-items-center justify-content-between">
                        <input type="file" name="image" id="blog_image" class="">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> Post</button>
                    </div>
                </form>
        </div>
        </div>
    </section>
</body>
<script src="../vendor/bootstrap-5.0.1-dist/js/bootstrap.bundle.js"></script>
</html>    
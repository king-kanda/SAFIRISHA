<?php
session_start();

if(!isset($_SESSION) && isset($_SESSION['loggedin'])!==true){
    header('location:login.php');
    exit();
}
require 'config.php';

// select from blogs
$sql = "SELECT `id`, `name`, `email`, `title`, `topic`, `content`, `date`, `img` FROM `post` ";
$stmt = $conn -> prepare($sql);
   if($stmt === false){
       echo "en erroe occured";
   }else{
       $stmt ->execute();
       $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
       foreach ($result as $blog){
        //    
       }
   }

// delete
if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['delete'])){
        if( isset($_POST['select-one']) ){
            $checkOne = $_POST['select-one'];
            // DELETE FROM `post` WHERE 0
            for($i= 0; $i<count($checkOne);$i++){ 
                $sql = "DELETE FROM `post` WHERE id = '$checkOne[$i]' ";
                $stsm = $conn ->prepare($sql);
                if($stsm === false){
                    echo "error .$conn->error";
                }else{
                    $stsm -> execute();
                    
                
                }
            }
    
        }
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
        <a class="list-group-item list-group-item-action-disabled" href="dashboard.php"> <i class="fa fa-home"></i> Dashboard</a>
        <a class="list-group-item list-group-item-action" href="#"> <i class="fa fa-cog"></i> Manage site</a>
        <a class="list-group-item list-group-item-action" href="#"> <i class="fa fa-user"></i> clients</a>
        <a class="list-group-item list-group-item-action" href="blog.php"> <i class="fa fa-pen-alt"></i> Press</a>
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


<section class="main p-2">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>"  method="POST">    
    <div class="container">
        <div class="dashboard d-flex align-items-center justify-content-between p-5">
            <h3 class="fw-bold p-2">Welcome,<?php echo htmlspecialchars($_SESSION['username']); ?>.</h3>
            <div class="blog_display">
                    <div class="input-group">
                            <input type="search" name="blog-search" id="blog-search" class="form-control" placeholder="search a topic">
                            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
            </div>
        </div>
        <div class="addblog  py-2 d-flex align-items-center justify-content-end">
            <div class="btn-add p-2">
                <a class="btn btn-primary " href="publish.php" >
                    <i class="fa fa-pen"></i> Add a blog post
                </a>
            </div>
            <div class="btn-delete">
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" method="POST">
                    <button class="btn btn-danger" type="submit"name="delete">
                        <i class="fa fa-trash"></i> Delete post
                    </button>
               </form>
            </div>
        </div>
            <!-- display blogs posted or not posted. -->
            <div class="blogs py-3">
               <div class="d-flex align-items-center justify-content-between">
                    <table class="table">
                        <thead class="" style="background-color: #00000008; padding:20px;">
                            <th scope="col"> <input type="checkbox" name="select-all" id="all-selected" class="form-check-input" value="All-selected"></th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Author email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date Published</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $blog): ?>
                                <tr>
                                    <th scope="row"> 
                                        <input type="checkbox" name="select-one[]"  class="form-check-input"  value="  <?php echo $blog['id'] ?>">
                                    </th>  
                                    <td> <?php echo $blog['title']?>
                                        <br>
                                        <span class="text-muted"><?php echo $blog['topic']?></span>
                                    </td>
                                    <td><?php echo $blog['name']?></td>
                                    <td><?php echo $blog['email']?></td>
                                    <td> <span class="badge badge-rounded-pill bg-warning">Pending Publication.</span> </td>
                                    <td><?php echo $blog['date']?></td>
                                    <td class="" id="action-tooltips">
                                        <!-- create tool tips for preview and update modals -->
                                      <button type="button" class="btn btn-success" id="edit" data-bs-toggle="modal" data-bs-target="#preview">
                                          <i class="fa fa-feather"></i> Edit/Preview
                                      </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
               </div>
            </div>
        </div>
    </div>
</form>
</section>
<!-- modal -->
<form action="update.php" method="POST" class="form-group" enctype="multipart/form-data" >
<div class="modal fade" tabindex="-1" id="preview" aria-labelledby="preview" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="fw-bold modal-title">Preview and edit</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-group" enctype="multipart/form-data" >
            <div class="modal-body">
                <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="row mb-3">
                                <div class="img-select" class="mb-3">
                                    <img src="../img/<?php echo $blog['img'] ?>" alt="" class="card-img">
                                    <input type="file" name="image" id="blog_image" class="" value="<?php echo $blog['img'] ?>">
                                </div>
                                <div class="col-6">
                                    <label for="title">Blog title</label>
                                    <input type="text" name="title" placeholder=" blog title" class="form-control"  value="<?php echo $blog['title'] ?>">
                                </div>
                                <div class="col-6">
                                    <label for="topic">topic</label>
                                <select name="topic" id="topic" class="form-control dataselect" value="<?php echo $blog['topic'] ?>">
                                    <option value="topic1">topic1</option>
                                    <option value="topic2">topic2</option>
                                    <option value="topic3">topic3</option>
                                    <option value="topic4">topic4</option>
                                    <option value="topic5">topic5</option>
                                </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                                <div class="blog-text mb-3">
                                    <label for="content">blog content</label>
                                    <textarea class="textarea form-control" name="content" id="blog_content" cols="30" rows="10" >
                                    <?php  echo $blog['content'] ?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('blog_content');
                                    </script>
                                </div>
                            </div>
                        </div>      
                   
                </div>
            </div>

            <div class="modal-footer">
              <div class="container">
                <button type="submit" class="btn btn-primary" name="update" value="<?php echo $blog['id'] ?>">
                    update
                </button>
              </div>
            </div>
        </div>
    </div>
</div>
</form>
<!-- modal end -->
</body>
<script src="../vendor/bootstrap-5.0.1-dist/js/bootstrap.bundle.js"></script>
<script type="text/javascript">
//    checkbox interactivity.
// creating a select and deselect 

var checkOne = document.getElementsByName('select-one[]');
// var checkOne = document.querySelectorAll('input[name="select-one"]:checked');
var checkAll = document.getElementById('all-selected');

checkAll.addEventListener('click',e=>{
    // check 
    if(checkAll.checked == true){
        for(var i=0;i<checkOne.length;i++){
            if(checkOne[i].checked == false){
                checkOne[i].checked = true;
            }
        }
    }
    // uncheck
    if(checkAll.checked == false){
        for(var i=0;i<checkOne.length;i++){
            if(checkOne[i].checked == true){
                checkOne[i].checked = false;
            }
        }
    }
})


</script>
</html>
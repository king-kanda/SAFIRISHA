<?php
// db
require 'config.php';
// submit update

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
    var_dump($content);
}else{
    $conn_err = "error";
}


if(isset($_POST['update'])){
    // get id 
    $id = $_POST['update'];
    var_dump($id);
    // save image
    $image_name = time(). '_'.$_FILES['image']['name'];
    $image_dest = "../img/".$image_name;
    $img_bool =move_uploaded_file($_FILES['image']["tmp_name"],$image_dest);
    if($img_bool === true){
        // echo ("image saved");
        var_dump($image_name);
    }
    // UPDATE `post` SET `id`='?',`name`='?',`email`='?',`title`='?',`topic`='?',`content`='?',`date`='?',`img`='?' WHERE 1

    $sql = "UPDATE `post` SET `title`=?,`topic`=?,`content`=?,`img`=? WHERE id = $id";
    $stmt = $conn ->prepare($sql);
    if ($stmt === false){
        echo "something went wrong with the sql statement";
    }else{
        $stmt ->bind_param('ssss',$title,$topic,$content,$image_name);
        $title =$input_title;
        $topic =$input_topic;
        $content =$input_content;
        if($stmt === true){
            $stmt ->execute();
            echo "done";
            header('location:blog.php');
            exit();
        }else{
            echo "error".$conn->error;
        }
    }
}
?>
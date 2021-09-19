<?php

// require
require 'config.php';

// delete from db -DELETE FROM `post` WHERE id = ? ;
// id from individual post $blog['id'];

function delete($postID){
    global $conn;
    $sql =" DELETE FROM `post` WHERE id = ?";
    $stmt = $conn ->prepare($sql);
    if($stmt === false){
        echo " an error occured.$conn->error";
    }else{
        $stmt ->bind_param('s',$postID);
        if($stmt -> execute()){
            header('location:blog.php');
            exit();
        }else{
            echo "an error occured.$conn->error";
        }
    }
    return $postID;

// $postID = delete(16); dlt call method is $postID= delete($blog['id]);

}
//_________________________________________________________________________________________________________________________________________//

// update from db syntax -> UPDATE `post` SET `id`='[value-1]',`name`='[value-2]',`email`='[value-3]',
// `title`='[value-4]',`topic`='[value-5]',`content`='[value-6]',`date`='[value-7]',`img`='[value-8]' WHERE 1


function update($data){
    global $conn;
    $sql ="  UPDATE post SET ";

    // loop through the loop addiing keys to sql
    $i=0;
    foreach($data as $key => $value){
        if($i===0){
            $sql = $sql ."$key =$value ";
        }else{
            $sql = $sql .", $key =$value ";
        }    
        $i++;
    }

    $sql = $sql ."WHERE id =17 ";
    var_dump($sql);
    $stmt = $conn ->prepare($sql);
    if($stmt === false){
        echo " anl error occured.$conn->error";
    }else{
        if($stmt -> execute()){
            header('location:blog.php');
            exit();
        }else{
            echo "an error occured.$conn->error";
        }
    }
    return $data;

        // $postID = delete(16,$data);
        //  dlt call method is $postID= delete($blog['id]);

}
$data =[
    'title'=>" 'va5lue4'",
    'topic'=>"'va4lue5'",
    'content'=>"'va3lue6'",
    'img'=>"'va1lue-8'"
];


 $postID = update($data);
//_________________________________________________________________________________________________________________________________//

// preview function aka the read /select.
function preview($id){
    global $conn;
    // SELECT `id`, `name`, `email`, `title`, `topic`, `content`, `date`, `img` FROM `post` WHERE 1
    $sql = " SELECT `title`, `topic`, `content`,`img` FROM `post` WHERE id= $id ";
    $stsm = $conn ->prepare($sql);
    if($stsm ===false){
        echo "a preparation error .$conn->error";
    }else{
        if($stsm ->execute()){
            $result = $stsm ->get_result() ->fetch_all(MYSQLI_ASSOC);
            // var_dump($result);  
            header('location:dashboard.php');
            exit();
        }else{
            echo "execution error.$conn->error";
        }
    }

   
    return $id;
}

$data= preview(18);


?>
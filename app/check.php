<?php
if($_SERVER["REQUEST_METHOD"]== "POST"){
    if(isset($_POST['select-one'])){
        $check = $_POST['select-one'];
        var_dump($check);       
        echo "hey";
    }else{
        echo ":not set";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        
    <input type="checkbox" name="select-one[]"  class="form-check-input" value="checked">
    <input type="checkbox" name="select-one[]"  class="form-check-input" value="checked">
    <input type="checkbox" name="select-one[]"  class="form-check-input" value="checked">
    <input type="checkbox" name="select-one[]"  class="form-check-input" value="checked">
    <button class="btn btn-primary">
        save
    </button>
    </form>
</body>
</html>
<?php

if(isset($_POST['sub'])){
    $filename=$_FILES['upfile']['tmp_name'];
    $actualfile_name=$_FILES['upfile']['name'];
    $size=$_FILES['upfile']['size'];
    $type=$_FILES['upfile']['type'];
    $error=$_FILES['upfile']['error'];
    echo $filename."<br>";
    echo $error."<br>";
    echo $actualfile_name."<br>";
    echo $size."<br>";
    echo $type."<br>";
    
    if(empty($name)){
        echo 'please choose file';
    }
    if($error>0){
        echo"uploading operation failed code id".$error;
    }
    else{
        if($size>1000000){
            echo "the file size must be less than 1000000";
          }
//          if($type=='image/jpeg'){
//              echo"this type is not allowed";
//              die("sorry");
//          }
          
              else{
                  move_uploaded_file($filename,"uploads/".$actualfile_name);
              }
    
    echo"file uploaded successfully";
    exit();
}
    }

?>

<html>
    <body>
        <form action="uploadfile.php" method="post" enctype="multipart/form-data" >
            please upload your file <input type="file" name="upfile">
            <input type="submit" name="sub" value="upload">
        </form>
    </body>
</html>
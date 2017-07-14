<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include("connect.php");
        $msg="";
        if(isset($_POST["submit"])){
            $imagename=mysqli_real_escape_string($db,$_FILES['image']['name']);
            $imagedata=mysqli_real_escape_string($db,file_get_contents($_FILES['image']['tmp_name']));
            $imagetype=mysqli_real_escape_string($db,$_FILES['image']['type']);
            if(substr($imagetype,0,5)=="image"){
               mysqli_query($db,"INSERT INTO photos(name,image) VALUES('".$imagename."','".$imagedata."')");
                   echo "image uploaded";
            }
            else{
                echo "only images are allowed";
            }
        }
        ?>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image"/>
            <input type="submit" name="submit" value="upload">
        </form>
        <img src="showimage.php?id=1"/>
    </body>
</html>

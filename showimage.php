<?php
include("connect.php");
if(isset($_GET['id'])){
    $id=mysqli_real_escape_string($db,$_GET['id']);
    $query=mysqli_query($db,"SELECT * FROM photos where id='".$id."'");
    while($row=mysqli_fetch_assoc($query)){
        $imagedata=$row['image'];
    }
    header("content-type: image/jpeg");
    echo $imagedata;
}
else{
    echo "error";
    }
?>
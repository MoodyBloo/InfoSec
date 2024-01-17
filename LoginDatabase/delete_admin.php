<?php
include 'config.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM users WHERE iD=$id";
    try{
        $result=mysqli_query($con,$sql);
        if($result){
            header('location:admin.php');
        }   else{
            die(mysqli_error($con));
        }
    }catch{

    }

   echo $alert ="<script> ('Are you sure you want to delete this row?'); </script>"
}
?>
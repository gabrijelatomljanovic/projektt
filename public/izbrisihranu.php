<?php
    require ('baza.php');
    session_start();
    if($_SESSION["uloga"]=="admin"){
        $id=$_GET["id"];
        $sql="DELETE FROM hrana WHERE id=".$id;
        $result = $con->query($sql);
        header("Location: hrana.php");
    }


?>

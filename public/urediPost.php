<?php

if (isset($_FILES["file"]["name"])) {
    $slika= $_FILES["file"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($slika);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
       echo "File je slika - " . $check["mime"] . ".";
       $uploadOk = 1;
    } else {
       echo "File is not an image.";
       $uploadOk = 0;
    }
    }
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
       echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    } else {
       echo "Sorry, there was an error uploading your file.";
    }
    require("baza.php");
    echo($_POST["id"]);
    $cijena=$_POST["cijena"];
    $ime=$_POST["ime"];
    $sastojci=$_POST["sastojci"];
    
    $sql="UPDATE hrana as h  set p.cijena=$cijena,p.naziv='$naziv',p.sastojci='$sastojci',p.slika='$slika' WHERE p.id=".$_POST["id"];
    $result = $con->query($sql);
    }

    require("baza.php");
    echo($_POST["id"]);
    $cijena=$_POST["cijena"];
    $ime=$_POST["ime"];
    $sastojci=$_POST["sastojci"];
    
    $sql="UPDATE hrana as p  set p.cijena=$cijena,p.naziv='$ime',p.sastojci='$sastojci' WHERE p.id=".$_POST["id"];
    $result = $con->query($sql);
   
?>
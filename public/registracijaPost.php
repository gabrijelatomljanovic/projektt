<?php
        require ('baza.php');
    if(isset($_POST["email"]) && isset($_POST["sifra"]))
    {
        $email= strtolower($_POST["email"]);
        $sifra=$_POST["sifra"];

        $sql="INSERT INTO korisnik (email,sifra,uloga) VALUES ('$email','$sifra', 'user')";
        $result = $con->query($sql);
        echo($sql);
        echo($result);
        
        header("Location: index.php");
    }
    else
    {
        echo("not ok");
    }



?>
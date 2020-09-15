<?php
require("baza.php");
session_start();
if(isset($_SESSION["email"]))
{
    header('Location: index.php');
}
if(isset($_POST["email"]) && isset($_POST["sifra"]))
    {
        $email=strtolower($_POST["email"]);
        $sifra=$_POST["sifra"];

        $id="select u.id as id,u.uloga as uloga
        from korisnik as u 
        where u.email='".$email."'";
        $resultId=$con->query($id);
        $rowId = $resultId->fetch_assoc();
        $id=$rowId["id"];
        $_SESSION["id"]=$id;
        $_SESSION["uloga"]=$rowId["uloga"];

        $sql = "select count(*) as brojac from korisnik where email='".$email."' and sifra='".$sifra."'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();       
        $brojac = $row['brojac'];
        if($brojac > 0){
            $_SESSION['email'] = $email;
            echo($_SESSION["email"]);
            header('Location: index.php');
        }else{
            echo "Invalid username and password";
        }
    }
    else
    {
        echo("not ok");
    }

?>
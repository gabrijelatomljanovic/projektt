<?php
    if (isset($_POST["adresa"])) {
        require ('baza.php');

        session_start();
        $adresa=$_POST["adresa"];
        echo($adresa);
        $sql="UPDATE dostava as d  set adresa='$adresa' WHERE d.id=".$_SESSION["idKorpe"];
        $result = $con->query($sql);
        // unset($_SESSION["idKorpe"]);
        // header("Location: index.php");
    }
?>
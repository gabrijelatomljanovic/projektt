<?php
    require("baza.php");
    session_start();
    if(isset($_SESSION["idKorpe"]))
    {
        unset($_SESSION["idKorpe"]);
        header("Location: index.php");
    }
    echo("greska");

?>
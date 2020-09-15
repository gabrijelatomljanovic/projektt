<?php
if (isset($_GET["id"])) {
    require ('baza.php');
    $id=$_GET["id"];
    session_start();
    // echo($adresa);
    $sql="UPDATE dostava as d  set dostavljeno=1 WHERE d.id=$id";;
    $result = $con->query($sql);
    unset($_SESSION["idKorpe"]);
    header("Location: svekupnje.php");
}
?>
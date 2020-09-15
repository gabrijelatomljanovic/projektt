<?php
    require("baza.php");
    session_start();

    
    if (isset($_GET["hrana"])) {
        $idhrana=$_GET["hrana"];
    }
    if (isset($_SESSION["idKorpe"])) {
        $iddostava=$_SESSION["idKorpe"];

    }
    if(isset($_SESSION["id"])){
        $idKorisnik=$_SESSION["id"];

    }

    if(isset($_GET["izbrisi"])){
        $izbrisiKorpu=$_GET["izbrisi"];
    }
    if (isset($izbrisiKorpu)) {
        unset($_SESSION["idKorpe"]);
        echo($izbrisiKorpu);

    }

    if(isset($idKorisnik) && isset($iddostava))
    {
        $values="(".$iddostava.",".$idKorisnik.",NOW())";
        $sql="INSERT INTO dostava (id, korisnikid, Datum) VALUES ".$values;
        $result = $con->query($sql);
        // echo($sql);
    }

    if (isset($idhrana) && isset($iddostava)) {
        //gleda ima li vec ta hrana u kosari
            $sql="SELECT COUNT(*) br FROM dostavahrana dh WHERE dh.hranaid=".$idhrana." and dh.dostavaid=".$iddostava;
	// echo($rowBrojac["brojac"]);
    $result=$con->query($sql);
    $br=69;
    while($row = $result->fetch_assoc()) {
        $br=$row["br"];
        echo($br);
    }
    if($br==0)
    {
        //ako nema u kosari onda ga doda
        $values="(".$iddostava.",".$idhrana.")";
        $sql="INSERT INTO dostavahrana (dostavaid,hranaid) VALUES ".$values;
        $result=$con->query($sql);
        echo($sql);
    }
    }
    


    

    header("Location: index.php");
?>
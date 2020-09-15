<?php
require("nav.php");
require("baza.php");

$sql="SELECT DISTINCT(d.id),k.email,d.dostavljeno,d.adresa as adresa FROM dostava as d inner join dostavahrana as dh on dh.dostavaid=d.id inner join korisnik as k on k.id=d.KorisnikId";
$result = $con->query($sql);

?>

<table class="table">
<thead>
      <tr>
        <th>dostava id</th>
        <th>Mail</th>
        <th>Stanje</th>
        <th>Dostavljeno</th>
        <th>Adresa</th>
      </tr>
    </thead>
    <tbody> 
    <?php
 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo("<tr>"
            .
            "<td>".$row["id"]."</td>"
            ."<td>".$row["email"]."</td>"
            ."<td>".$row["dostavljeno"]."</td>"
            ."<td><a name='dostavi' href='dostavi.php?id=".$row["id"]."'> <span class='glyphicon glyphicon-plus'></a></span></td>"
            ."<td>".$row["adresa"]."</td>"
        );
    }
}
    ?>
    </tbody>
</table>
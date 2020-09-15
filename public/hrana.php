<?php
    require ('baza.php');
    require('nav.php'); 
?>

<?php
$sql = "SELECT * from hrana";
$result = $con->query($sql);

?>


<div class="container">
  <h2>Hrana</h2>
  <a href="dodajHranu.php" class="btn btn-info">Dodajte hranu </a>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Naziv</th>
      </tr>
    </thead>
    <tbody>
    <?php
        if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo("<tr>"
            .
            "<td>".$row["id"]."</td>"
            .
            "<td>".$row["naziv"]."</td>"
            
            
        );
        echo("<td><a name='izbrisi' href='izbrisihranu.php?id=".$row["id"]."'> <span class='glyphicon glyphicon-remove'></a></span></td>");
        echo("<td><a name='uredi' href='uredihranu.php?id=".$row["id"]."'> <span class='glyphicon glyphicon-pencil'></a></span></td>");
        echo("</tr>");
    }
}
    ?>
    </tbody>
</table>

<?php require('footer.php')?>

<?php require('nav.php')?>

<?php
	require ('baza.php');
	function generateRandomString() {
	return rand(0,10000000);
}
	
	if(!isset($_SESSION["idKorpe"]))
	{
		$idKorpe=generateRandomString();
		//echo($idKorpe);
		$_SESSION["idKorpe"]=$idKorpe;
		echo($idKorpe."test");
	}
?>
<body>
<style>
.fit-image{
width: 100%;
object-fit: cover;
height: 300px; 
}
</style>
	<div class="container">
	<div class="row">
    <div class="col-sm-9">
		<?php
            $sql="select * from hrana";
			$result = $con->query($sql);

			
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		
		echo ('
			  <div class="col-sm-3">
    		<div class="thumbnail">
				<img src="uploads/'.$row["slika"].'" alt="slika" class="img-responsive" width = "100%" ></div>

                    <p>Ime: '.$row["naziv"].'</p><h4> Cijena: '.$row["cijena"].'</h4>
                    <p>'.$row["sastojci"].'</p>

					<p><a href="dodajudostavu.php?hrana='.$row["id"].'" class="btn btn-primary" role="button">Dodaj</a></p>
				</div>
		');
	}
} else {
    echo "0 results";
}
		?>
			

	</div>
	<aside class="col-sm-3">
			
            <div id="smartcart" class="panel panel-default sc-cart sc-theme-default">
                <input type="hidden" name="cart_list" id="cart_list" />
                <div class="panel-heading sc-cart-heading">
                    Korpa
                    <span class="sc-cart-count badge">
					<?php
					//broji sve  u kosari
						$brojac="SELECT COUNT(*) as brojac FROM dostavahrana as dh INNER JOIN hrana as h on h.id=dh.hranaid INNER JOIN dostava as d on d.id=dh.dostavaid WHERE d.dostavljeno=0 and  d.id=".$_SESSION["idKorpe"];
						$resultBrojac=$con->query($brojac);
						$rowBrojac = $resultBrojac->fetch_assoc();
						echo($rowBrojac["brojac"]);
					?>
					
					</span>
                </div>

                <div class="list-group sc-cart-item-list">
                    <div id="izbrisi" class="sc-cart-item list-group-item" data-unique-key="1528315106377">
                        <table id="kosarica" class="table">
                            <thead>
                                <tr>
								<th>Naziv</th>
								<th>Cijena</th>
                            </thead>
                            <tbody>
                                <tr class="tr">
                                  
									<?php 
									if(isset($_SESSION["idKorpe"]) && isset($_SESSION["id"]) ){
										$kosara="SELECT dh.hranaid,dh.dostavaid,h.naziv,h.cijena from dostavahrana as dh inner join hrana as h ON h.id=dh.hranaid INNER JOIN dostava as d on d.id=dh.dostavaid where d.id=". $_SESSION["idKorpe"];
										$resultKosara = $con->query($kosara);
										    while($rowKosara = $resultKosara->fetch_assoc()) {
												echo("<td>".
													$rowKosara["naziv"]
													."</td>"
													."<td>"
													.$rowKosara["cijena"]
													."</td></tr>"
												);
											}
										}
										else {
											echo("prijavite se da bi mogli dodati u kosaru");
										}
									?>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="panel-footer sc-toolbar">
                    <div class="sc-cart-summary">
                        <div class="sc-cart-summary-subtotal">
                            Ukupno:
							<?php
							$suma="SELECT SUM(h.cijena) as sumaa FROM hrana as h inner join dostavahrana as dh on dh.hranaid=h.id inner JOIN dostava as d on d.id=dh.dostavaid where d.id=".$_SESSION["idKorpe"];
							$resultSuma=$con->query($suma);
							$rowSuma=$resultSuma->fetch_assoc();
							$zbroj=($rowSuma["sumaa"]);
							?>
                            <span class="sc-cart-subtotal"><?php echo($zbroj)?></span>
                        </div>
                    </div>
                    <div class="sc-cart-toolbar">
					<form action="zavrsikupnju.php" method="post">
					<?php	
						if (isset($_SESSION["uloga"])) {
							echo('<a href="zavrsikupnju.php" class="btn btn-info sc-cart-checkout" type="button" id="zavrsiKupnju">Zavrsi kupnju</a>');
						
						}
							else {
								echo("Prijavite se da bi zavrsili narudžbu");
							}
					?>

                        <a href="ispraznikosaricu.php" type="button" class="btn btn-danger btn-md" >Isprazni kosaricu</a>
</form>
                    </div>
                </div>
            </div>
    </aside>
	</div>

<?php require('footer.php')?>
</html>

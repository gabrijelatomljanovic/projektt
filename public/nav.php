<?php 
  session_start();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Dostava</title>
		    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">

	</head>
<nav class="navbar navbar-default">
  <div class="container-fluid">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Naslovna</a></li>
        <!-- <li><a href=""><?php echo($_SESSION["uloga"]);?></a></li>
        <li><a href=""><?php echo($_SESSION["id"]);?></a></li> -->

        <?php

        //   }
          
        ?>

      </ul>
      <!-- <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
      <ul class="nav navbar-nav navbar-right">
        
          <!-- <a href="#" >Prijavljeni ste kao gost</a> -->
          <?php
           
            if(isset($_SESSION["email"]))
            {            if ($_SESSION["uloga"]=="admin")
              {
                echo('<li><a href="svekupnje.php">Sve kupnje</a></li>');
                echo('<li><a href="hrana.php">Hrana</a></li>');
              }   
            //   echo('<a href="logout.php" >Odjava</a>');
              echo('<li><a href="#" >Prijavljeni ste kao '.$_SESSION["email"].'</a></li>');
              echo('<li><a href="logout.php">Odjava</a></li>');

            //   echo($_SESSION["id"]);
            //   echo($_SESSION["idKorpe"]);
            }
            

            else{
              echo('<li><a href="registracija.php">Registracija</a></li>');
              echo('<li><a href="prijava.php">Prijava</a></li>');
              echo("<li><a href= >Prijavljeni ste kao gost</a></li>");
            }
            
          ?>
      </ul>
    </div>
  </div>
</nav>	
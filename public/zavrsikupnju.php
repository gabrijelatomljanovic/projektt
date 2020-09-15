<?php
    require('nav.php')    
?>
<form action="zavrsikupnjupost.php" method="post">
<div class="container">

	<div class="row">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="Adresa dostave" aria-describedby="basic-addon1" name="adresa">
        </div>
        <br>
        
<button class="btn btn-info" type="submit">Dostavi</button>
</form>
</div>


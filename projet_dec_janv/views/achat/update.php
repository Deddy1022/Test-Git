<html>
<head>
	<title></title>
	
</head>
<?php foreach ($donnees as $d) {?>
<body>
	  	<div class="container">
	    	<form action="" method="POST">
		      <label >Article</label><br>
		      <input type="text" name="nomart" value="<?php echo $d['nomart']?>"><br><br>
		      <label>quantite</label><br>
		      <input type="text" name="quantite" value="<?php echo $d['quantite']?>"><br>
		      <div align="center"><input type="submit" name="update" value="Valider">
		      </div>

    		</form>
		</div>
		<script>
			
		</script>
</body>
<?php } ?>
</html>
<html>
<head>
	<title></title>
	
</head>
<?php foreach ($donnees as $d) {?>
<body>
	  	<div class="container">
	    	<form action="index.php?controller=user&action=update&" method="POST">
		      <label >Nom</label><br>
		      <input type="text" name="nom" class="form-control" value=""><br><br>
		      <label>Prenom</label><br>
		      <input type="text" name="prenom" class="form-control" value=""><br>
		      <label>Password</label><br>
		      <input type="password" name="password" placeholder="Entrer votre Mot de passe" class="form-control" value="<?php echo $d['password']?>"><br>
		      <div align="center"><input type="submit" name="update" class="btn btn-cyan" value="Update">
		      </div>

    		</form>
		</div>
		<script>
			
		</script>
</body>
<?php } ?>
</html>
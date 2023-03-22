<?php

foreach($donnees as $d){
?>
<html>
<body>
<div class="col">
    <form class="col s7" action="" method="POST">
      <div class="">
        <div class="input-field col s4">
          <label for="address">id</label>
          <input name="id_fou" id="address" type="hidden" class="validate" value="<?php echo $d["id_fou"]; ?>">
          
        </div>

        <div class="input-field col s4">
          <label for="address">Nom Fournisseur</label>
          <input name="nom_fou" id="address" type="text" class="validate" value="<?php echo $d["nom_fou"]; ?>">
          
        </div>
        <div class="input-field col s4">
          <label for="address">Adresse</label>
          <input name="adresse_fou" id="address" type="text" class="validate" value="<?php echo $d["adresse_fou"]; ?>">
        </div>

        <div class="input-field col s4">
          <label for="addressc"Contatc</label>
          <input name="contact" id="address" type="text" class="validate" value="<?php echo $d["contact"]; ?>">
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="update">Update
          <i class="material-icons right">send</i>
        </button>
      </div>
    </form>
  </div>
</body>
</html>
<?php } ?>
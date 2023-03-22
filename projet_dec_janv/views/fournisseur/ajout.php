<html>
<body>
  <?php foreach ($donnees['Id_Fou'] as $d) {
    $lastId=$d['id_fou'];
    if ($lastId == " ") {
      $newId = "F001";
    } else {
      $newId = substr($lastId,3);
      $newId = intval($newId);
      $newId = "F00".($newId+1);
    }
  }
  ?>

<div class="" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="h4 mb-4 text-center" id="myModalLabel">FOURNISSEUR</h4></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST">

          <div class="form-row">
            <div class="col">
            	

              <div class="md-form mt-0">
                <i class="fa fa-user prefix purple-text"></i>
				        <input type="text" name="id_fou" id="id_fou" class="form-control" autocomplete="off" value="<?php echo $newId ?>">
              </div>
            </div>
          </div><br>


          <div class="form-row">
            
            <div class="col">

              <div class="md-form mt-0">
                <i class="fa fa-user prefix purple-text"></i>
	    		      <input type="text" name="nom_fou" id="nom_fou" placeholder="Fournisseur" class="form-control" autocomplete="off">
              </div>
            </div>
            
          </div><br>

          <div class="form-row">
            <div class="col">
              <div class="md-form form-ms">
               	<i class="far fa-address-book prefix yellow-text"></i>
    	    	    <input type="text" name="adresse_fou" id="adresse_fou" class="form-control" placeholder="Adresse" autocomplete="off">
              </div>
            </div>
          </div><br>


          <div class="form-row">
            <div class="col">

              <div class="md-form mt-0">
                <i class="fa fa-user prefix purple-text"></i>
	    		      <input type="text" name="contact" id="contact" placeholder="Contact" class="form-control" autocomplete="off">
              </div>
            </div>
          </div>

          
         
          <div align="center"><input type="submit" name="insert" id="mybtn" class="btn btn-cyan" value="Ajouter">
		      </div>
          
      </form>

      </div>
    </div>
  </div>
</div>


</body>
<script>
	$(document).ready(function(){
	    SNButton.init("mybtn", {
	      fields: ["id_fou", "nom_fou", "adresse_fou", "contact"]
	    });
	});
</script>
</html>
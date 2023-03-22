<html>
<head>
</head>
<body>
	<?php foreach ($donnees['ID'] as $d) { 
		$lastId = $d['id_client'];
		if ($lastId == '') {
			$newId = "CL001";
		} else {
			$newId = substr($lastId, 4);
			$newId = intval($newId);
			$newId = "CL00".($newId + 1);
		}
	}	
	?>

	<div class="" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="h4 mb-4 text-center" id="myModalLabel">CLIENT</h4></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST">

          <div class="form-row">
            <div class="col">

              <div class="md-form mt-0">
                <i class="fas fa-user-tag prefix purple-text"></i>
                <input name="id_client" id="name" type="text" id="materialFormCardNameEx" class="form-control form-control-sm" autocomplete="off" value="<?php echo $newId?>">
              </div>
            </div>
            
          </div><br>

          <!--DIV ARTICLE-->

          <div class="form-row" id="article0" >
            
            <div class="col">

              <div class="md-form mt-0">
                <i class="fas fa-user-tie prefix blue-text"></i>
                <input type="text" name="nom_cli" id="nom_cli" class="form-control form-control-sm" autocomplete="off">
                <label>Nom</label>
              </div>
            </div>

          </div><br>

          <div class="form-row" id="article0" >
            
            <div class="col">

              <div class="md-form mt-0">
                <i class="fas fa-user-circle prefix green-text"></i>
                <input type="text" name="prenom_cli" id="prenom_cli"  class="form-control form-control-sm" autocomplete="off">
                <label>Prenom</label>
              </div>
            </div>

          </div><br>

          <div class="form-row" id="article0" >
            
            <div class="col">

              <div class="md-form mt-0">
                <i class="far fa-address-card prefix black-text"></i>
                <input type="text" name="adresse_cli" id="adresse_cli" class="form-control form-control-sm" autocomplete="off">
                <label>Adresse</label>
              </div>
            </div>

          </div>   
         
          <div align="center"><button type="submit" id="mybtn" name="insert" class="btn btn-cyan" value="">New Client</button>
          </div>
          
      </form>

      </div>
    </div>
  </div>
</body>
</html>
<script>
  $(document).ready(function(){
    SNButton.init("mybtn", {
      fields: ["nom_cli", "prenom_cli", "adresse_cli"]
    });
  });
</script>
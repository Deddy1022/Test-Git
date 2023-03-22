<html>
<head>
	<title></title>
</head>
<body>

	 <div class="" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="h4 mb-4 text-center" id="myModalLabel">APPROVISIONNEMENT EN ARTICLES</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST">

      <div class="form-row">
  		  <div class="col">
  		    <div class="md-form mt-0">
            <i class="far fa-newspaper prefix"></i>
  		      <input type="text" name="id_article" placeholder="idArticle" class="form-control id_article" autocomplete="off" readonly>
  		    </div>
		    </div>

  		  <div class="col">
  		    <div class="md-form mt-0">
  		      <input type="text" name="nomart" placeholder="Nom Article" class="form-control nom_article" autocomplete="off" readonly>
  		    </div>
  		  </div>

  		  <div class="col">
  		    <div class="md-form mt-0">
  		      <input type="text" name="qte_article" placeholder="Quantite en Stock" class="form-control qte_article" autocomplete="off" readonly>
  		    </div>
  		  </div>
  		  
  		  <div class="col">
  		    <div class="md-form mt-0">
            <button type="button" class="btn btn-blue-grey showmodal" data-toggle="modal" data-target="#myModalArticle"><i class="fas fa-newspaper"></i></button>
  		    </div>
  		  </div>
		  </div>

		<div class="form-row">
		  <div class="col">
		    <div class="md-form mt-0">
          <i class="fas fa-sort-numeric-up prefix green-text"></i>
		      <input type="number" name="qte" placeholder="Qte reset" class="form-control">
		    </div>
		  </div>

      <div class="col">
        <div class="md-form mt-0">
          <input type="text" name="prix_unitaire" placeholder="prix" class="form-control prix_unitaire" autocomplete="off" readonly>
        </div>
      </div>

      <div class="col">
        <div class="md-form mt-0">
          <button type="button" class="btn btn-dark-green showmodal" data-toggle="modal" data-target="#ModalPrix"><i class="fas fa-dollar-sign white-text"></i></button>
        </div>
      </div>
		</div>
		<div class="form-row">
			<div class="col">
			    <div class="md-form mt-0">
            <i class="far fa-calendar-check prefix red-text"></i>
			      <input type="text" name="id_fou" placeholder="Fournisseur" class="form-control id_fou" autocomplete="off" readonly>
			    </div>
			</div>

			<div class="col">
			    <div class="md-form mt-0">
			      <input type="date" name="date" id="date" class="form-control">
			    </div>
			</div>

			<div class="col">
		    	<div class="md-form mt-0">
            <button type="button" class="btn btn-blue-grey showmodal" data-toggle="modal" data-target="#myModalfournisseur"><i class="fas fa-truck-moving white-text"></i></button>
		    	</div>
		  	</div>
		</div>



		<div align="center"><a href=""><input type="submit" name="insert" class="btn btn-cyan" value="Ajouter"></a></div>
          
      </form>

      </div>
    </div>
  </div>
</div>
		
		
</body>
</html>

<!--#####################################################################################################################################-->

<!--MODAL LISTE D'ARTICLE-->

<div class="modal fade" id="myModalArticle">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <div class="input-group md-form form-sm form-2 pl-0">
            <input name="search_text" id="search_article" class="form-control my-0 py-1 red-border search_text" type="text" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <span class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
                  aria-hidden="true"></i></span>
            </div>
          </div>
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <span class="counter pull-right"></span>
        <table class="table table-hover">
          <thead class="black-text">
            <tr>
              <th scope="col">Id Article</th>
              <th scope="col">Nom Article</th>
              <th scope="col">Stock</th>
            </tr>
            <!--<tr class="no-result warning">
              <td colspan="5">No result</td>
            </tr>-->
          </thead>
              <?php foreach ($donnees['Article'] as $d){?>
                <tbody class="liste_article">
                  <tr>
                    <td><?php echo $d['id_article']; ?></td>
                    <td><?php echo $d['nomart']; ?></td>
                    <td><?php echo $d['qte_article']; ?></td>
                    <td><button type="button" data-id="<?php echo $d['id_article']; ?>" data-nom="<?php echo $d['nomart']; ?>" data-target="<?php echo $d['qte_article'];?>"  class="btn btn-cyan button_add_art">Ajouter</button></td>
                  </tr>
                </tbody>
              <?php } ?>
        </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
</div>

<!--#####################################################################################################################################-->

<!--MODAL LISTE FOURNISSEUR-->

<div class="modal fade" id="myModalfournisseur">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <div class="input-group md-form form-sm form-2 pl-0">
            <input name="search_text" id="search_fournisseur" class="form-control my-0 py-1 red-border search_text" type="text" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <span class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
                  aria-hidden="true"></i></span>
            </div>
          </div>
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <span class="counter pull-right"></span>
        <table class="table table-hover">
          <thead class="black-text">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nom Fournisseur</th>
            </tr>
            <!--<tr class="no-result warning">
              <td colspan="5">No result</td>
            </tr>-->
          </thead>
              <?php foreach ($donnees['Fou'] as $d){?>
                <tbody class="liste_fournisseur">
                  <tr>
                    <td><?php echo $d['id_fou']; ?></td>
                    <td><?php echo $d['nom_fou']; ?></td>
                    <td><button type="button" data-id="<?php echo $d['id_fou']; ?>" data-nom="<?php echo $d['nom_fou']; ?>" class="btn btn-cyan button_add_fou">Ajouter</button></td>
                  </tr>
                </tbody>
              <?php } ?>
        </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
</div>

<!--#####################################################################################################################################-->

<!--MODAL PRIX-->
<div class="modal fade" id="ModalPrix">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <div class="input-group md-form form-sm form-2 pl-0">
            <input name="search_text" id="search_price" class="form-control my-0 py-1 red-border search_text" type="text" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <span class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
                  aria-hidden="true"></i></span>
            </div>
          </div>
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <span class="counter pull-right"></span>
        <table class="table table-hover">
          <thead class="black-text">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nom Fournisseur</th>
            </tr>
            <!--<tr class="no-result warning">
              <td colspan="5">No result</td>
            </tr>-->
          </thead>
              <?php foreach ($donnees['Price'] as $d){?>
                <tbody class="liste_price">
                  <tr>
                    <td><?php echo $d['id_article']; ?></td>
                    <td><?php echo $d['prix_unitaire']; ?></td>
                    <td><button type="button" data-id="<?php echo $d['id_article']; ?>" data-nom="<?php echo $d['prix_unitaire']; ?>" class="btn btn-cyan button_add_price">Ajouter</button></td>
                  </tr>
                </tbody>
              <?php } ?>
        </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
</div>

<!--#####################################################################################################################################-->

<script>
	$(document).ready(function(){

    document.getElementById("date").valueAsDate = new Date();


		$('.button_add_art').on('click', function(){
	        var dataId = $(this).attr("data-id");
	        var dataNom = $(this).attr("data-nom");
	        var dataTarget = $(this).attr("data-target");
	        $('.id_article').val(dataId);
	        $('.nom_article').val(dataNom);
	        $('.qte_article').val(dataTarget);
	        
	     });

		$('.button_add_fou').on('click', function(){
	        var dataId = $(this).attr("data-id");
	        var dataNom = $(this).attr("data-nom");
	        $('.id_fou').val(dataId);

	        
	  });

    $('.button_add_price').on('click', function(){
          var dataId = $(this).attr("data-id");
          var dataNom = $(this).attr("data-nom");
          $('.prix_unitaire').val(dataNom);
    });

    $(document).ready(function(){

      $('#search_fournisseur').keyup(function(){
        search_table($(this).val());
      });

      function search_table(value){
        $('.liste_fournisseur tr').each(function(){
          var found = 'false';
          $(this).each(function(){
            if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
              found = 'true';
            }
          });
          if (found == 'true') {
            $(this).show();
          }else{
            $(this).hide();
          }
        });
      }
    });
    $(document).ready(function(){



      $('#search_price').keyup(function(){
        search_table($(this).val());
      });

      function search_table(value){
        $('.liste_price tr').each(function(){
          var found = 'false';
          $(this).each(function(){
            if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
              found = 'true';
            }
          });
          if (found == 'true') {
            $(this).show();
          }else{
            $(this).hide();
          }
        });
      }
    });
    $(document).ready(function(){



      $('#search_article').keyup(function(){
        search_table($(this).val());
      });

      function search_table(value){
        $('.liste_article tr').each(function(){
          var found = 'false';
          $(this).each(function(){
            if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
              found = 'true';
            }
          });
          if (found == 'true') {
            $(this).show();
          }else{
            $(this).hide();
          }
        });
      }
    });
	});
</script>
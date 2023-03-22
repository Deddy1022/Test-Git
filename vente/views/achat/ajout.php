<html>
<body>
                                          <!-- INPUT VALUE -->
<div>
  <!--Modal: Contact form-->
  <div class="" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="h4 mb-4 text-center" id="myModalLabel">ACHAT D'ARTICLES</h4></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST">

          <div class="form-row">
            <div class="col">

              <div class="md-form mt-0">
                <i class="fas fa-user-check prefix green-text"></i>
                <input type="text" name="id_client" id="id_client" placeholder="Client" id="materialFormCardNameEx" readonly class="form-control form-control-sm client" autocomplete="off">
              </div>
            </div>
            

            <div class="col">

              <div class="md-form mt-0">
                <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#MyModalClient" value="+">
              </div>
            </div>

          </div>

          <!--DIV ARTICLE-->
          <span class="append_mode">+</span>
          <div id="contain">
          <div class="form-row" id="article0" >
            
            <div class="col">

              <div class="md-form mt-0">
                <i class="fas fa-newspaper prefix"></i>
                <input autocomplete="off" type="text" name="id_article[]" id="id_article0" class="form-control" placeholder="Article" readonly>
              </div>
            </div>
            

            <div class="col">

              <div class="md-form mt-0">
                <input type="number" name="quantite[]" placeholder="Quantite" id="quantite0" class="form-control" required>
              </div>
            </div>

            <div class="col">

              <div class="md-form mt-0">
                <input type="text" name="prix_vente[]" placeholder="Prix" id="prix_vente0" class="form-control" readonly>
              </div>
            </div>

            <div class="col">

              <div class="md-form mt-0">
                <input type="button" class="btn btn-default showmodal" data-id="0" data-toggle="modal" data-target="#myModalAchat" value="select">
              </div>
            </div>

            <div class="col"><div class="md-form mt-0"><input type="hidden" name="remove" id="'+i+'" class="btn btn-danger btn_remove" type="submit" value="X"></div></div>


          </div>
          
          </div><br> 
          



          <div class="md-form form-ms">
            <i class="fa fa-calendar-alt prefix red-text"></i>
            <input type="date" name="date_achat" id="date_achat" class="form-control" value="">
            <label>Date</label><br>
          </div>

          
         
          <div align="center"><button type="submit" id="mybtn" name="insert" class="btn btn-black" value=""><i id="size" class="fas fa-cart-plus prefix white-text"></i>vendue</button>
          </div>
          
      </form>

      </div>
    </div>
  </div>
</div>


<!--########################################################################################################################--> 


<!--MODAL CLIENT-->
<div class="modal fade" id="MyModalClient">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-header">
        <div class="input-group md-form form-sm form-2 pl-0">
          <input name="search_text" id="search_client" class="form-control my-0 py-1 red-border search_text" type="text" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <span class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
                aria-hidden="true"></i></span>
          </div>
        </div>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <div class="modal-body">
        <span class="counter pull-right"></span>
      <table class="table table-hover">
        <thead class="black-text">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom Client</th>
          </tr>
        </thead>

            <?php foreach ($donnees['Client'] as $d){?>
              <tbody class="liste_client">
                <tr>
                  <td ><?php echo $d['id_client']; ?></td>
                  <td><?php echo $d['nom_cli']; ?></td>
                  <td><button type="button" data-id="<?php echo $d['id_client']; ?>" data-nom="<?php echo $d['nom_cli']; ?>" class="btn btn-cyan add_client">Ajouter</button></td>
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
<input type="hidden" name="nombrearticle" id='nombrearticle' value="1"> 
<input type="hidden" name="articleselect" id='articleselect' value="1"> 
<form method="POST">

<!--########################################################################################################################--> 

<!-- The Modal ARTICLE-->
<div class="modal fade" id="myModalAchat">
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
                  <td><?php echo $d['prix_vente']; ?></td>
                  <td><button type="button" data-id="<?php echo $d['id_article']; ?>" data-nom="<?php echo $d['nomart']; ?>" data-prix="<?php echo $d['prix_vente']; ?>" class="btn btn-cyan button_add">Ajouter</button></td>
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
  
<!--########################################################################################################################--> 
  	
</form>

<!--<input type="text" name="search" id="search">-->






		<!--Mdal pop-up-->
	<script></script>

	<script>
		$(document).ready(function(){
      document.getElementById("date_achat").valueAsDate = new Date();


      //RECHERCHE DE CLIENT ET ARTICLE
    $(document).ready(function(){
     $('#search_client').keyup(function(){
        search_table($(this).val());
      });

      function search_table(value){
        $('.liste_client tr').each(function(){
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
      
      //AJOUT DE CLIENT DANS INPUT

      $('.add_client').on('click', function(){
        var dataId = $(this).attr("data-id");
        var dataNom = $(this).attr("data-nom");
        $('.client').val(dataId);
        
      });


      //AJOUT ARTICLE DANS INPUT
      $('.button_add').on('click', function(e){
        e.preventDefault();
        var id=$("#articleselect").val();
        console.log(id);
        var dataId = $(this).attr("data-id");
        var dataNom = $(this).attr("data-nom");
        var dataPrix = $(this).attr("data-prix");
        var i = 0;
          $('#id_article'+id+'').val(dataId);
          $('#article'+id+'').val(dataNom);
          $('#prix_vente'+id+'').val(dataPrix);
         
      });
      

      //POINTER MODAL
      $(document).on('click',".showmodal", function(){
        var id=$(this).attr("data-id");

        console.log(id);
        $("#articleselect").val(id);
      });


      //APPEND TYPE INPUT
      $(".append_mode").on('click', function(){
        var i=$("#nombrearticle").val()+1;
        $("#contain").append('<div class="form-row" id="article'+i+'"> <div class="col"><div class="md-form mt-0"><i class="fas fa-newspaper prefix"></i><input type="text" name="id_article[]" placeholder="Article" id="id_article'+i+'" class="form-control" readonly></div></div> <div class="col"><div class="md-form mt-0"><input type="number" name="quantite[]" placeholder="Quantite" id="quantite'+i+'" class="form-control"></div></div> <div class="col"><div class="md-form mt-0"><input type="text" name="prix_vente[]" id="prix_vente'+i+'" placeholder="Prix" class="form-control"></div></div> <div class="col"><div class="md-form mt-0"><input type="button" class="btn btn-default showmodal" data-id="'+i+'" data-toggle="modal" data-target="#myModalAchat" value="select"> </div></div><div class="col"><div class="md-form mt-0"><input type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" type="submit" value="X"></div></div></div>');


          $(document).on('click', '.btn_remove', function(){
          var button_id = $(this).attr("id")
          $('#article'+button_id+'').remove();
          console.log(i);
        });
          $("#nombrearticle").val(i);
      });
      











			/*document.getElementById('open').addEventListener('click', function(){
				document.querySelector('.bg_modal').style.display = "flex";
			});

			document.querySelector('.close').addEventListener('click', function(){
				document.querySelector('.bg_modal').style.display="none";
			});

			document.getElementById('open').addEventListener('click', function(){
				$('#article').show();
			});*/

  			/*$("#search").keyup(function(e){
      			e.preventDefault();
      //*
      			var datas={
        		search:"abs"
      		};
      		$.ajax({
       			type: "POST",
        		url: "index.php?controller=achatt&action=search&ajax=1",
        		async:false,
        		data: datas,
        		success:function(res){
          			var result=jQuery.parseJSON(res);
          			$(".listcontent").html("");
          			for(i in result.article){
            			var art=result.article[i];
            			var content=$(".listdefault").clone();
            			//alert(cli.id);
            			//console.log(content.html());
            			content.css("display","block");
            			//console.log(content.html());
            			content.find(".id_article").html(art.id);
            			content.find(".nomart").html(art.nom);
            			//deleteurl.attr("href",urledelete);
            			//deleteurl.removeClass(".urldelete");
            
            			$(".listcontent").append(content.find("tbody").html());
          			};
          			console.log
        		},
       			error:function(){
          			jAlert("il y a eu une erreur lors de l'enregistrement","Erreur");
        		}
      		});
      		//
  		});

      $('#search_text').keyup(function(){
        var searchTerm = $('#search_text').val();
        var listItem = $('.results').children('tr');
        var searchSplit = searchTerm.replace(/ /g, "'):containsi('");
        $.extends($.expr[':'],{
          'containsi': function(elem, i, match, array){
            return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] ||"").toLowerCase()) >= 0;
          }
        });
        $(".results tr").not(":containsi('"+ searchSplit +"')").each(function(){
          $(this).attr('visible','false');
        });
        $(".results tr:containsi('"+ searchSplit +"')").each(function(){
          $(this).attr('visible','true');
        });

        var jobCount = $('.results tr[visible="true"]').length;
        $('.counter').text(jobCount + 'item');
        if (jobCount == 0) {
          $('.no-result').show();
        } else{
          $('.no-result').hide();
        }
      });*/
  
	});		

		
	</script>
	

</body>
</html>
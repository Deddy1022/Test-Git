<div><h1>Client Adherant: <span><?php echo $donnees['CountClient'] ?></span></h1></div>
<!-- Material inline form -->
<table class="table table-hover">
  <thead class="black white-text">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Adresse</th>
      <th scope="col">
        <input class="form-control my-0 py-1 lime-border" name="search" id="search_client" type="text" placeholder="Search..." aria-label="Search">
      </th>
      <th></th>
    </tr>
  </thead>
  
  <?php
    foreach($donnees["Client"] as $d):
  ?>
  <tbody class="liste_client">
    <tr>
    	<td><?php echo $d["id_client"]; ?></td>
	    <td><?php echo $d['nom_cli']; ?></td>
  		<td><?php echo $d['prenom_cli']; ?></td>
  		<td><?php echo $d['adresse_cli']; ?></td>
    	<td>
        	<a data-toggle="modal" data-target="#EditClient" class="editurl btn btn-info update"><i class="fas fa-edit"></i></a>
       		<a class="btn btn-danger delete" name="delete" data-toggle="modal" data-target="#DeleteModal"><i class="fas fa-trash"></i></a>
      	</td>
    </tr>
  </tbody>
    <?php endforeach ;?>

</table>


<!--########################################################################################################################-->

<div class="modal fade" id="EditClient">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><strong>Update Client</strong></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
        <form method="POST" action="index.php?controller=client&action=update&view=index">

          <div class="form-row">
            <div class="col">
              <div class="md-form mt-0">
                <i class="fas fa-user-tag prefix purple-text"></i>
                <input name="id_client" id="id_client" type="text" class="form-control" value="" readonly>
              </div>
          </div>
            
        </div><br>

        <div class="form-row">
          <div class="col">
            <div class="md-form mt-0">
              <i class="fas fa-user-tie prefix blue-text"></i>
              <input name="nom_cli" id="nom_cli" type="text" class="form-control" value="" autocomplete="off">
            </div>
          </div>
        </div><br>


        <div class="form-row">
          <div class="col">
              <div class="md-form mt-0">
                <i class="fas fa-user-circle prefix green-text"></i>
                <input name="prenom_cli" id="prenom_cli" type="text" class="form-control" autocomplete="off" required>
              </div>
          </div>
        </div><br>


        <div class="form-row">
          <div class="col">
              <div class="md-form mt-0">
                <i class="far fa-address-card prefix black-text"></i>
                <input name="adresse_cli" id="adresse_cli" type="text" class="form-control" value="" autocomplete="off" required>
              </div>
          </div>

        </div>

        
        <div align="center">
          <button class="btn btn-success" type="submit" name="update" id="save">Confirm
            <i class="fas fa-check"></i>
          </button>          
        </div>
          
      </form>

    </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
        </div>
        
      </div>
    </div>
  </div>
  
</div>

<!--########################################################################################################################-->

<div class="modal fade" id="DeleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="index.php?controller=client&action=delete&view=index" method="POST">
        
        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="id_client" id="delete_id">
          <h4 class="h4 mb-4 text-center" > Are you sure?</h4><br><center><i class="fas fa-exclamation-triangle" style="color:#cc0000; font-size: 100px;"></i></center><br>
          <center><h5>You won't be able to revert this!</h5></center>
        
          <div align="center">
            <button type="button" class="btn btn-danger" data-dismiss="modal">NO, Cancel! </button>
            <button type="submit" name="deletedata" class="btn btn-default"> Yes !! Delete it </button>
          </div>
        </div>
        
      </form>
    </div>
  </div>
  
</div>


<!--########################################################################################################################-->

<script type="text/javascript">
$(document).ready(function(){
  $("#search").keyup(function(e){
      //alert("ato");
      e.preventDefault();
      //*
      var datas={
        search:"abs"
      };
      $.ajax({
        type: "POST",
        url: "index.php?controller=client&action=search&ajax=1",
        async:false,
        data: datas,
        success:function(res){
          var result=jQuery.parseJSON(res);
          $(".listcontent").html("");
          for(i in result.client){
            var cli=result.client[i];
            var content=$(".listdefault").clone();
            //alert(cli.id);
            //console.log(content.html());
            content.css("display","block");
            //console.log(content.html());
            content.find(".idclient").html(cli.id);
            content.find(".nom").html(cli.nom);
            content.find(".adresse").html(cli.adresse);
            content.find(".contact").html(cli.contact);
            var editurl=content.find(".editurl");
            var delurl=content.find(".delurl");
            var urledit="index.php?controller=client&action=update&id_client="+cli.id+"";
            var urldel="index.php?controller=client&action=delete&id_client="+cli.id+"&view=index";
            editurl.attr("href",urledit);
            delurl.attr("href",urldel);
            editurl.removeClass("urledit");
            delurl.removeClass("urldel");
            //deleteurl.attr("href",urledelete);
            //deleteurl.removeClass(".urldelete");
            
            $(".listcontent").append(content.find("tbody").html());
          };
          
          // console.log(result.client);
        },
        error:function(){
          jAlert("il y a eu une erreur lors de l'enregistrement","Erreur");
        }
      });
      //*/
  });

  $(document).ready(function(){
    $('.update').on('click', function(e){
      e.preventDefault();
      $tr = $(this).closest('tr');
      var data = $tr.children('td').map(function(){
        return $(this).text();
      }).get();
      console.log(data);

      $('#id_client').val(data[0]);
      $('#nom_cli').val(data[1]);
      $('#prenom_cli').val(data[2]);
      $('#adresse_cli').val(data[3]);
    });
  });

  $(document).ready(function(){
    $(".delete").on('click', function(){
      $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();
        console.log(data);

        $('#delete_id').val(data[0]);
    });
  });

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
  

});
</script>
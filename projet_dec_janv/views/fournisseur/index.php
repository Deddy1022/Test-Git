
<table class="table table-hover">
	<thead class="red white-text">
		<div align="center"><h1>Listes des Fournisseurs: <span><?php echo $donnees['CountFou'] ?></span></h1></div>
			<tr>
				<th scope="col">Id</th>
        <th scope="col">Nom Fournisseur</th>
        <th scope="col">Adresse</th>
        <th scope="col">Contact</th>
        <th scope="col">
            <input class="form-control my-0 py-1 lime-border" name="search" id="search_fournisseur" type="text" placeholder="Search..." aria-label="Search">   
        </th>
			</tr>
  </thead>
<?php
foreach($donnees["Fou"] as $d){
?>
  <tbody class="liste_fournisseur">
    <tr>
      <td scope="col" data-target="id_fou"><?php echo $d['id_fou']; ?></td>
      <td scope="col" data-target="nom_fou"><?php echo $d['nom_fou']; ?></td>
      <td scope="col" data-target="adresse_fou"><?php echo $d['adresse_fou']; ?></td>
    	<td scope="col" data-target="contact"><?php echo $d['contact']; ?></td>
    	<td scope="col"><a data-role="update" data-id="<?php echo $d['id_fou']; ?>"><button type="button" name="update" id="update" class="btn btn-success update" data-toggle="modal" data-target="#EditFournisseur" value=""><i class="fas fa-edit"></i></button></a>
    	<button type="button" class="btn btn-danger deleter" data-toggle="modal" data-target="#DeleteModal"><i class="fas fa-trash"></i></button></td>
    	</div>
        
    </tr>
  </tbody>
<?php
}

?>
</table>

<!--########################################################################################################################-->


<div class="modal fade" id="EditFournisseur">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><strong>Update Fournisseur</strong></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
        <form method="POST" action="index.php?controller=fournisseur&action=update&view=index">

          <div class="form-row">
            <div class="col">
              <div class="md-form mt-0">
                <i class="fas fa-user-circle prefix purple-text"></i>
                <input name="id_fou" id="id_fou" type="text" class="form-control" value="" readonly>
              </div>
          </div>
            
        </div><br>

        <div class="form-row">
          <div class="col">
            <div class="md-form mt-0">
              <i class="fas fa-truck-loading prefix grey-text"></i><input name="nom_fou" id="nom_fou" type="text" class="form-control" value="" autocomplete="off">
            </div>
          </div>
        </div><br>

        <div class="form-row">
          <div class="col">
              <div class="md-form mt-0">
                <i class="fas fa-map-marked-alt prefix"></i>
                <input name="adresse_fou" id="adresse_fou" type="text" class="form-control" value="" autocomplete="off">
              </div>
          </div>

        </div><br>

        <div class="form-row">
          <div class="col">
              <div class="md-form mt-0">
              <i class="fas fa-phone prefix green-text"></i><input name="contact" id="contact" type="text" class="form-control" autocomplete="off">
              </div>
          </div>
        </div>

        
        <div align="center">
          <button class="btn btn-success" type="submit" name="update" id="save">
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


<!--########################################################################################################################-->


<div class="modal fade" id="DeleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="index.php?controller=fournisseur&action=delete&view=index" method="POST">

        <div class="modal-body">
          <input type="hidden" name="id_fou" id="delete_id">
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


<script>
$(document).ready(function(){

  $(document).ready(function(){
    $(".deleter").on('click', function(){
      $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();
        console.log(data);

        $('#delete_id').val(data[0]);
    });
  });
    

  $(document).ready(function(){
    $('.update').on('click', function(e){
      e.preventDefault();
      $tr = $(this).closest('tr');
      var data = $tr.children('td').map(function(){
        return $(this).text();
      }).get();
      console.log(data);

      $('#id_fou').val(data[0]);
      $('#nom_fou').val(data[1]);
      $('#adresse_fou').val(data[2]);
      $('#contact').val(data[3]);
    });
  });

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
</script>

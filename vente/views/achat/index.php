<table class="table table-hover">
	<thead class="blue black-text">
		<div align="center"><h1>Liste des Achats</h1></div>
			<tr>
				<th scope="col">Id Client</th><th scope="col">date</th><th></th>
			</tr>
	</thead>
	<?php
	foreach($donnees["Achat"] as $d){
	?>

			<tr>
				<td><?php echo $d['id_client']; ?></td>
			    <td><?php echo $d['date_achat']; ?></td>
				<td><button type="submit" name="update" class="btn btn-success update" data-toggle="modal" data-target="#AchatUpdate"><i class="fas fa-edit"></i></button>

					<button type="submit" name="delete" class="btn btn-danger delete" id="deleter" data-toggle="modal" data-target="#DeleteModal"><i class="fas fa-trash"></i></button>

					<a href="?controller=facture&action=index&id_client=<?php echo $d['id_client'] ?>&date_achat=<?php echo $d['date_achat'] ?>"> <button type="submit" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">+</button></a>
				</td>
			</tr>
			
<?php
}

?>

<!--########################################################################################################################-->


<div class="modal fade" id="DeleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="index.php?controller=achat&action=delete&view=index" method="POST">
        
        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="id_client" id="delete_id">
          <input type="hidden" name="date_achat" id="delete_date">
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

<div class="modal fade" id="AchatUpdate">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><strong>Update Achat</strong></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
        <form method="POST" action="index.php?controller=achat&action=update&view=index">

          <div class="form-row">
            <div class="col">
              <div class="md-form mt-0">
              	<i class="fas fa-user-tag prefix purple-text"></i>
                <input name="id_client" id="id_client" type="text" class="form-control" value="" readonly>
              </div>
          </div>
            
        </div>

        <div class="form-row">
          <div class="col">
            <div class="md-form mt-0">
            	<i class="far fa-calendar-alt prefix red-text"></i>
              <input name="date_achat" id="date_achat" type="date" class="form-control">
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

<script>
	$(document).ready(function(){
      $(".delete").on('click', function(){
        $tr = $(this).closest('tr');
          var data = $tr.children('td').map(function(){
            return $(this).text();
          }).get();
          console.log(data);

          $('#delete_id').val(data[0]);
          $('#delete_date').val(data[1]);
      });

      $('.update').on('click', function(e){
        e.preventDefault();
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();
        console.log(data);
        

        $('#id_client').val(data[0]);
      });

      document.getElementById('date_achat').valueAsDate= new Date();
    });
</script>
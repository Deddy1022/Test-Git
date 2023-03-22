<html>
<body>
<?php foreach ($donnees['Id_Article'] as $d) {
  $lastId = $d['id_article'];
  if ($lastId == '') {
    $newId = "A001";
  } else {
    $newId = substr($lastId, 3);
    $newId = intval($newId);
    $newId = "A00".($newId + 1);
  }
  
?>

  <!--Modal: Contact form-->
  <div class="" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="h4 mb-4 text-center" id="myModalLabel">Nouvel Article</h4></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST">

          <div class="form-row">
            <div class="col">

              <div class="md-form mt-0">
                <i class="fas fa-briefcase prefix grey-text"></i>
                <input type="text" name="id_article" id="id_article" placeholder="Id Article" class="form-control form-control-sm" autocomplete="off" value="<?php echo $newId ?>">
              </div>
            </div>

          </div><br>
          <?php } ?>

          <div class="form-row">
            
            <div class="col">

              <div class="md-form mt-0">
                <i class="far fa-newspaper prefix"></i>
                <input type="text" name="nomart" id="nomart" placeholder="Nom Article" class="form-control form-control-sm" autocomplete="off">
              </div>
            </div>


          </div>


          
         
          <div align="center"><input type="submit" name="insert" id="mybtn" class="btn btn-cyan" value="Ajouter"><i id="size" class="fas fa-cart-plus prefix white-text"></i>
          </div>
          
      </form>

      </div>
    </div>
  </div>
</div>
</body>
</html>


<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <div class="input-group md-form form-sm form-2 pl-0">
            <input name="search_text" id="search_text" class="form-control my-0 py-1 red-border search_text" type="text" placeholder="Search" aria-label="Search">
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
              <th></th>
            </tr>
            <!--<tr class="no-result warning">
              <td colspan="5">No result</td>
            </tr>-->
          </thead>
              <?php foreach ($donnees['Fou'] as $d){?>
                <tbody id="liste_table">
                  <tr>
                    <td><?php echo $d['id_fou']; ?></td>
                    <td><?php echo $d['nom_fou']; ?></td>
                    <td><button type="button" data-id="<?php echo $d['id_fou'] ?>" data-nom="<?php echo $d['nom_fou'] ?>" class="btn btn-cyan button_add">Ajouter</button></td>
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

  <script>
  	$(document).ready(function(){
      $('#search_text').keyup(function(){
        search_table($(this).val());
      });

      function search_table(value){
        $('#liste_table tr').each(function(){
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

      $('.button_add').on('click', function(){
         var dataId = $(this).attr("data-id");
         var dataNom = $(this).attr("data-nom");
         document.getElementById('fournisseur').value = dataNom;
         //alert("data:"+dataId+" "+dataNom);
      });

      $(document).ready(function(){
        SNButton.init("mybtn", {
          fields: ["id_article", "nomart"]
        });
      });
    });
  </script>


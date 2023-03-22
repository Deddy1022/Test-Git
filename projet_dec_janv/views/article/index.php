<button type="submit" name="rupture" class="btn btn-cyan" id="btnuser" data-toggle="modal" data-target="#myModalrupture"><i class="fas fa-archive"></i></button>
<table class="table table-hover">
	<thead class="green black-text">
    <div><h1>Total Article: <span><?php echo $donnees['Count'] ?></span></h1></div>
		<tr>
			<th scope="col">ID</th>
      <th scope="col">Nom Article</th>
      <th scope="col">Details</th>
      <th scope="col">
        <input class="form-control my-0 py-1 lime-border" name="search" id="search_article" type="text" placeholder="Search..." aria-label="Search">   
      </th>
		</tr>
	</thead>

<?php
foreach($donnees["Article"] as $d){
?>
  <tbody class="liste_article">
    <tr>
      <td class="article"><?php echo $d['id_article']; ?></td>
      <td class="article"><?php echo $d['nomart']; ?></td>
      <td><a href="?controller=article&action=detail&view=detail&id_article=<?php echo $d['id_article']?>"><input type="button" class="btn btn-primary showmodal" data-id="<?php echo $d['id_article']; ?>" value="+"></a></td>
      <td><button type="submit" name="update" class="btn btn-success update" data-toggle="modal" data-target="#EditArticle" value=""><i class="fas fa-edit"></i></button>
      <a data-toggle="modal" data-target="#DeleteModal" class="btn btn-danger delete"><i class="fas fa-trash"></i></a></td>
    </tr>
  </tbody>
<?php } ?>
</table>

<!--############################################################################################################################-->

<div class="modal fade" id="EditArticle">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><strong>Update Article</strong></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
        <form method="POST" action="index.php?controller=article&action=update&view=index">

          <div class="form-row">
            <div class="col">
              <div class="md-form mt-0">
                <i class="fas fa-user-circle prefix purple-text"></i>
                <input name="id_article" id="id_article" type="text" class="form-control" value="" readonly>
              </div>
            </div>
            
          </div>

          <div class="form-row">
            <div class="col">
              <div class="md-form mt-0">
                <i class="fas fa-newspaper prefix grey-text"></i>
                <input name="article" id="article" type="text" class="form-control" value="" autocomplete="off" readonly>
              </div>
            </div>
          </div>

          <center><b>Update:</b></center>
          <div class="form-row">
            <div class="col">
                <div class="md-form mt-0">
                  <i class="fas fa-newspaper prefix green-text"></i>
                  <input name="nomart" id="nomart" type="text" class="form-control" value="" autocomplete="off" required placeholder="Nouveau nom">
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

<!--############################################################################################################################-->


<div class="modal fade" id="DeleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="index.php?controller=article&action=delete&view=index" method="post">
        
        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="id_article" id="delete_id">
          <h4 class="h4 mb-4 text-center" > Are you sure?</h4><br><center><i class="fas fa-exclamation-triangle" style="color:#cc0000; font-size: 100px;"></i></center><br>
          <center><h5>You won't be able to revert this!</h5></center>
        
          <div align="center">
            <button type="button" class="btn btn-danger" data-dismiss="modal">NO, Cancel! </button>
            <button type="submit" name="deletedata" class="btn btn-default"> Yes !! Delete it </button>
          </div>
        </div>
        
      </div>
      </form>
    </div>
  </div>
  
</div>


<!--########################################################################################################################-->


<!-- The Modal ARTICLE-->
<div class="modal fade" id="myModalrupture">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <div class="input-group md-form form-sm form-2 pl-0">
          <input name="search_text" id="search_rupture" class="form-control my-0 py-1 red-border search_text" type="text" placeholder="Search..." aria-label="Search">
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
          <div><b style="color:red">Rupture de Stock: <span><?php echo $donnees['countrupture'] ?></span></b></div>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom Article</th>
            <th scope="col">En Stock</th>
          </tr>
          <!--<tr class="no-result warning">
            <td colspan="5">No result</td>
          </tr>-->
        </thead>
            <?php foreach ($donnees['rupture'] as $d){?>
              <tbody class="liste_rupture">
                <tr>
                  <td><?php echo $d['id_article']; ?></td>
                  <td><?php echo $d['nomart']; ?></td>
                  <td class="article"><i style="color:#888888;">rupture de stock</i></td>
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

  <script>
  $(document).ready(function(){
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

    $('#search_rupture').keyup(function(){
      search_table($(this).val());
    });

    function search_table(value){
      $('.liste_rupture tr').each(function(){
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

    
    $('').on('click', function(e){
      e.preventDefault();
      const href = $(this).attr("index.php?controller=article&action=delete&view=index&id_article=<?php echo $d['id_article']; ?>");

      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          );
          document.location.href = "index.php?controller=article&action=delete&view=index&id_article=<?php echo $d['id_article']; ?>";
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
    });

    $('.button_add').on('click', function(e){
        e.preventDefault();
        var id=$("#pointerarticle").val();
        console.log(id);
      });

     $(document).on('click',".article", function(){
      var i = $(this).attr(id);
      alert(i);
     });
      

      //POINTER MODAL
      /*$(document).on('click',".showmodal", function(){
        var i = $(this).attr("data-id");
        var id = $(this).val();
        var z ="<?php //echo $d['id_article']; ?>"
        console.log(i);
        console.log(z);
      });*/

      $(document).on('click',".showmodal", function(){
        var id_article = $(this).attr('id');
        console.log(id_article);
      });


      $(document).ready(function(){
        $('.update').on('click', function(e){
          e.preventDefault();
          $tr = $(this).closest('tr');
          var data = $tr.children('td').map(function(){
            return $(this).text();
          }).get();
          console.log(data);
          

          $('#id_article').val(data[0]);
          $('#article').val(data[1]);
          $('#password').val(data[4]);
          $('#new_password').val();
        });
      });

    });
  </script>
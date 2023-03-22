<div class="" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="h4 mb-4 text-center" id="myModalLabel"></h4></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <h1><center>WELCOME <span class="user"></span></center></h1>
      </div>
          
      </form>

      </div>
    </div>
  </div>
</div>
<?php foreach ($donnees['Exist'] as $k) {
} ?>
<script>
    var a = "<?php echo $k['nom']?> <?php echo $k['prenom'] ?>";
    var id = $('.user').text(a);
    console.log(a);

</script>


<button id="btnuser" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalUser">
    <i class="far fa-plus-square prefix black-text"></i><i class="fas fa-address-card prefix black-text"></i>
  </button>
<table class="table table-hover">
  <thead class="blue black-text">
    <div align="center"><h1>Utilisateur Connecter</h1></div>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">telephone</th>
        <th scope="col">
            <input class="form-control my-0 py-1 lime-border" name="search" id="search_user" type="text" placeholder="Search" aria-label="Search">   
        </th>
        <th></th>
      </tr>
  </thead>
<?php
foreach($donnees["User"] as $d){
?>
<tbody class="liste_user">
  <tr>
    <td><?php echo $d['id']; ?></td>
      <td><?php echo $d['nom']; ?></td>
      <td><?php echo $d['prenom']; ?></td>
      <td style="display:none;"><?php echo $d['email']; ?></td>
      <td style="display:none;"><?php echo $d['password']; ?></td>
      <td><?php echo $d['tel']; ?></td>
    <td><button type="submit" name="update" class="btn btn-success update" data-toggle="modal" data-target="#EditUser"><i class="fas fa-user-edit"></i></button>
    <button type="submit" name="delete" class="btn btn-danger delete" data-toggle="modal" data-target="#DeleteModal" value=""><i class="fas fa-trash"></i></button></td>
    </div>
      
  </tr>
</tbody>
<?php
}

?>
</table>


<!--########################################################################################################-->
  

  <!-- The Modal -->
  <form action="index.php?controller=user&action=ajout&view=index" method="POST">
  <div class="modal fade" id="myModalUser">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><strong>Ajout User</strong></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->

        <div class="modal-body">
        
          <div class="form-row">
            <div class="col">
              <div class="md-form mt-0">
                <i class="fa fa-user prefix purple-text"></i>
              <input type="text" name="nom" id="nom" class="form-control" placeholder="nom" autocomplete="off">
              </div>
          </div>

            <div class="col">
              <div class="md-form mt-0">
                <input type="text" name="prenom" class="form-control" placeholder="prenom" autocomplete="off"><br>
              </div>
            </div>
            
        </div>

        <div class="form-row">
          <div class="col">
            <div class="md-form mt-0">
              <i class="fa fa-envelope prefix blue-text"></i>
            <input type="email" name="email" id="mail" class="form-control form-control-sm" placeholder="email" autocomplete="off"><br>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col">
              <div class="md-form mt-0">
                  <i class="fa fa-mobile prefix black-text"></i>
                <input type="text" name="tel"  class="form-control" placeholder="your number phone" autocomplete="off"><br>
              </div>
          </div>

        </div>

        
        <div class="form-row">
          <div class="col">
              <div class="md-form mt-0">
                  <i class="fa fa-lock prefix green-text"></i>
                  <input type="password" name="password" id="pass" placeholder="password"  class="form-control"><br>
              </div>
          </div><i class="fa fa-eye blue-text" id="eye" onclick="showpass()"></i>

        </div>

        <div class="form-row">
          <div class="col">
              <div class="md-form mt-0">
                      <i class="fa fa-exclamation-triangle prefix red-text"></i>
                  <input type="password" name="confirm_password" id="confirm_pass" placeholder="confirm your password..." class="form-control"><br>
              </div>
          </div><i class="fa fa-eye blue-text" id="eye" onclick="confirmpass()"></i>                  
        </div>



    <div align="center"><a href=""><input type="submit" id="mybtn" name="insert" class="btn btn-cyan" value="Ajouter"></a></div>
          
      

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
        </div>
        
      </div>
    </div>
  </div>
  
</div>
</form>

<!--########################################################################################################-->


<!--########################################################################################################-->
<div class="modal fade" id="EditUser">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><strong>Update User password</strong></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
        <form method="POST" action="index.php?controller=user&action=update&view=index">

          <div class="form-row">
            <div class="col">
              <div class="md-form mt-0">
                <b>Identifiant:</b><input name="id" id="id" type="text" class="form-control" value="" readonly>
              </div>
          </div>
            
        </div>

        <div class="form-row">
          <div class="col">
            <div class="md-form mt-0">
              <b>Email:</b><input name="email" id="email" type="email" class="form-control" value="" autocomplete="off" readonly>
            </div>
          </div>
        </div>

        <b>Password:</b>
        <div class="form-row">
          <div class="col">
              <div class="md-form mt-0">
                
                <input name="password" id="password" type="password" class="form-control" value="" autocomplete="off" readonly>
              </div>
          </div><i class="fas fa-wifi black-text" id="eye" onclick="passwordShow()"></i>

        </div>

        <b>New Password:</b>
        <div class="form-row">
          <div class="col">
              <div class="md-form mt-0">
                
                <input name="new_password" id="new_password" type="password" class="form-control" autocomplete="off" required>
              </div>
          </div><i class="fa fa-eye prefix blue-text" id="eye" onclick="newpass()"></i>

        </div>


        <b>Confirm Your New Password:</b>
        <div class="form-row">
          <div class="col">
              <div class="md-form mt-0">
                
                <input name="confirm_new_password" id="confirm_new_password" type="password" class="form-control" autocomplete="off" required>
              </div>
          </div><i class="fa fa-eye blue-text prefix" id="eye" onclick="showconfnew()"></i>
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


<div class="modal fade" id="DeleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="index.php?controller=user&action=delete&view=index" method="POST">
        
        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" name="id" id="delete_id">
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
  function passwordShow(){
    var pwd = document.getElementById('password');
    
    if (pwd.type == "text") {
      pwd.type = "password";

    }else{
      pwd.type = "text";
    }
  }
  function newpass(){
    var pass = document.getElementById('new_password');
    
    if (pass.type == "text") {
      pass.type = "password";

    }else{
      pass.type = "text";
    }
  }

  function showconfnew(){
    var confirm_pass = document.getElementById('confirm_new_password');
    
    if (confirm_pass.type == "text") {
      confirm_pass.type = "password";

    }else{
      confirm_pass.type = "text";
    }
  }

  function showpass(){
      var password = document.getElementById('pass');
      
      if (password.type == "text") {
        password.type = "password";

      }else{
        password.type = "text";
      }
    }

  function confirmpass(){
    var pass = document.getElementById('confirm_pass');
    
    if (pass.type == "text") {
      pass.type = "password";

    }else{
      pass.type = "text";
    }
  }
</script>


<script>
  $(document).ready(function(){
    $('').on('click', function(e){
      e.preventDefault();
      const href = $(this).attr("href=index.php?controller=user&action=delete&view=index&id=<?php echo $d['id']; ?>&nom=<?php echo $d['nom'];?>");

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
          document.location.href = "index.php?controller=user&action=delete&view=index&id=<?php echo $d['id']; ?>&nom=<?php echo $d['nom'];?>";
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

    $(document).ready(function(){
      $('.update').on('click', function(e){
        e.preventDefault();
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();
        console.log(data);
        

        $('#id').val(data[0]);
        $('#email').val(data[3]);
        $('#password').val(data[4]);
        $('#new_password').val();
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

    $('#search_user').keyup(function(){
      search_table($(this).val());
    });

    function search_table(value){
      $('.liste_user tr').each(function(){
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

    

  $(document).ready(function(){
    SNButton.init("mybtn", {
        fields: ["nom", "mail", "pass"]
    });
});

  });
</script>





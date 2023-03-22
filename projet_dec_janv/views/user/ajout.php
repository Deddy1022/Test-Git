<html>

<body>
	<script>
			$(document).ready(function(){
			
				$('#nav').hide();

				
			});
	</script>
	

	<div class="" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    	<div class="modal-content">
      		<div class="modal-header">
        	<h4 class="h4 mb-4 text-center" id="myModalLabel">Nouvel Utilisateur</h4>
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
					  <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="email" autocomplete="off"><br>
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
				      		<input type="password" name="password" id="password" placeholder="password"  class="form-control"><br>
					    </div>
					</div><i class="fa fa-eye blue-text" id="eye" onclick="showpass()"></i>

				</div>

				<div class="form-row">
					<div class="col">
					    <div class="md-form mt-0">
              				<i class="fa fa-exclamation-triangle prefix red-text"></i>
				      		<input type="password" name="confirm_password" id="confirm_password" placeholder="confirm your password..." class="form-control"><br>
					    </div>
					</div><i class="fa fa-eye blue-text" id="eye" onclick="confirmpass()"></i>					      	
				</div>



		<div align="center"><a href=""><input type="submit" id="mybtn" name="insert" class="btn btn-cyan" value="Ajouter"></a></div>

		<div class="modal-footer mx-5 pt-3 mb-1">
        <p class="font-small grey-text d-flex justify-content-end">Already a member? <a href="index.php?controller=user" class="blue-text ml-1">
            Sign In</a></p>
      </div>
          
      </form>

      </div>
    </div>
  </div>
</div>	

<script>
		/*var confirm_password = document.getElementById('confirm_password');
		var eye = document.getElementById('eye');

		eye.addEventListener('click', togglePass;

		function togglePass(){

			eye.classlist.toggle('active');

			(password.type == 'password') ? password.type = 'text': password.type = 'password';
		}*/
	function showpass(){
		var password = document.getElementById('password');
		
		if (password.type == "text") {
			password.type = "password";

		}else{
			password.type = "text";
		}
	}

	function confirmpass(){
		var pass = document.getElementById('confirm_password');
		
		if (pass.type == "text") {
			pass.type = "password";

		}else{
			pass.type = "text";
		}
	}

	$(document).ready(function(){
        SNButton.init("mybtn", {
            fields: ["nom", "email", "password"]
        });
    });
</script>
</body>
</html>
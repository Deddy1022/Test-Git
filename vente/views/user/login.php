<html>
<!-- Modal -->
<form method="POST">
<div aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Sign in</strong></h3>
      </div>
      <!--Body-->
      <div class="modal-body mx-4">
        <!--Body-->
        <div class="md-form mb-5">
          <input type="email" name="email" id="email-input" class="form-control mb-3" autocomplete="off" required>
          <label data-error="wrong" data-success="right" for="Form-email1">Your email</label>
        </div>

        <div class="md-form pb-3">
          <input type="password" name="password" id="password-input" class="form-control mb-3" required>
          <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label>
          <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="#" class="blue-text ml-1">
              Password?</a></p>
        </div>

        <div class="text-center mb-3">
          <button type="submit" name="login" class="btn blue-gradient btn-block btn-rounded z-depth-1a" id="mybtn">Sign in</button>
        </div>
        <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in
          with:</p>

        <div class="row my-3 d-flex justify-content-center">
          <!--Facebook-->
          <a href="http://facebook.com" target="_blank" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-facebook-f text-center"></i></a>
          <!--Twitter-->
          <a href="http://twitter.com" target="_blank" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-twitter"></i></a>
          <!--Google +-->
          <a href="http://gmail.com" target="_blank" class="btn btn-white btn-rounded z-depth-1a"><i class="fab fa-google-plus-g"></i></a>
        </div>
      </div>
      <!--Footer-->
      <div class="modal-footer mx-5 pt-3 mb-1">
        <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="?controller=user&action=ajout" class="blue-text ml-1">
            Sign Up</a></p>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal -->

</form>

  <!-- Grid container -->



  

		<script>


			$(document).ready(function(){
				$('#nav').hide();
        $(document).ready(function(){
          SNButton.init("mybtn", {
            fields: ["email-input", "password-input"]
          });
        });
        
      });
		</script>
    
</body>
</html>




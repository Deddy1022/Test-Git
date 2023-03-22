<div  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="index.php?controller=user&action=admin" method="POST" name="vform">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Administrateur</h4>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="email" name="email" id="email" class="form-control form-control-sm" autocomplete="off"><br>
          <label data-error="wrong" data-success="right" for="form3">Your Email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="password" name="password" id="password" class="form-control"><br>
          <label data-error="wrong" data-success="right" for="form2">Your Password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" name="admin" id="mybtn" class="btn btn-indigo">Login<i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
    </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    SNButton.init("mybtn", {
        fields: ["email", "password"]
    });
  });
</script>


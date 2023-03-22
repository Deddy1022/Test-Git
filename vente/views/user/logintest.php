<!-- Default form login -->
<script>$("#nav").hide();</script>
<form class="text-center border border-light p-5" action="?controller=user&action=index" method="POST">

    <p class="h4 mb-3">Sign in</p>

    Email
    <input type="email" name="email" id="email-input" class="form-control mb-3" placeholder="Email" autocomplete="off" required>
    Password 
    <input type="password" name="password" id="password-input" class="form-control mb-3" placeholder="Password" required>

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
 
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit" name="login">Sign in</button>

    <!-- Register -->
    <p>Not a member?
        <a href="index.php?controller=user&action=add">Register</a>
    </p>

    <!-- Social login -->
    <p>or sign in with:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

</form>
<!-- Default form login -->



<?php
//var_dump($donnees);
foreach($donnees as $d):
?>
<html>
<body>
<div class="col">
    <form class="col s7" action="?controller=client&action=update&view=index" method="POST">
      <div class="">
        <div class="input-field col s4">
          <label for="name">id_article</label>
          <input name="id_client" id="name" type="hidden" class="validate" value="<?php echo $d["id_article"]; ?> ">
        </div>
        <div class="input-field col s4">
          <label for="address">Nom Article</label>
          <input name="nom" id="address" type="text" class="validate" value="<?php echo $d["nomart"]; ?>">
          
        </div>
        <div class="input-field col s4">
          <label for="address">Fournisseur</label>
          <input name="adresse" id="address" type="text" class="validate" value="<?php echo $d["fournisseur"]; ?>">
          
        </div>
        </div>
        <div class="input-field col s4">
        <label for="city">Id Categorie</label>
          <input id="city" name="contact" type="text" class="validate" value="<?php echo $d["id_categorie"]; ?>">
       
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="update">Modify
          <i class="material-icons right">send</i>
        </button>
        </div>
    </form>
  </div>
</body>
</html>
<?php endforeach; ?>
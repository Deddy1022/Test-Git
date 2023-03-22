<!DOCTYPE html>
<html>
<head>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">

  <link rel="stylesheet" type="text/css" href="style/print.css" media="print">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

  <script src="js/snbutton.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-oqVuAfXRKap7fdgcCY5uykM6+R9GqQ8K/uxy9rx7HNQlGYl1kPzQho1wx4JwY8wC" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="bootstrap/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="style/css/style.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

  <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="bootstrap/js/mdb.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="style/css1.css">

</head>
<body>
    <nav id="nav" class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
    <a id="logo" class="navbar-brand">
        <img src="image/dssi.png" height="50" width="70" alt="">
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
        aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">

           <li class="nav-item">
            <a class="nav-link admin_user" id="navbarDropdownMenuLink-777"  aria-haspopup="true"  aria-expanded="false" href="index.php?controller=user&action=index" data-toggle="modal" data-target="#modalAdmin">user
            </a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-777" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Client
            </a>
            <div id="drop" class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-777">
              <a class="dropdown-item" href="index.php?controller=client&action=ajout"><i class="fas fa-plus"></i>Nouveau client</a>
              <a class="dropdown-item" href="index.php?controller=client&action=index"><i class="fas fa-list"></i>Liste client</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Article
            </a>
            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
              <a class="dropdown-item" href="index.php?controller=article&action=ajout"><i class="fas fa-plus"></i>Nouvel article</a>
              <a class="dropdown-item" href="index.php?controller=article&action=index"><i class="fas fa-list"></i>Liste article</a>
              <a class="dropdown-item" href="index.php?controller=appro&action=ajout"><i class="fas fa-truck-loading"></i>Approvisionnement</a>

            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Fournisseur
            </a>
            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
              <a class="dropdown-item" href="index.php?controller=fournisseur&action=ajout"><i class="fas fa-plus"></i>Nouveau Fournisseur</a>
              <a class="dropdown-item" href="index.php?controller=fournisseur&action=index"><i class="fas fa-list"></i>Liste Fournisseur</a>
            </div>
          </li>

           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-777" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Achat
            </a>
            <div id="drop" class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-777">
              <a class="dropdown-item" href="index.php?controller=achat&action=ajout"><i class="fas fa-plus"></i>Effectuer Achat</a>
              <a class="dropdown-item" href="index.php?controller=achat&action=index"><i class="fas fa-list"></i>Ventes</a>
            </div>
          </li>

        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link waves-effect waves-light">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect waves-light">
              <i class="fab fa-google-plus-g"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-default"
              aria-labelledby="navbarDropdownMenuLink-333">
              <a id='logOut' class="dropdown-item" href="index.php?controller=user&action=login"><i class="fas fa-sign-out-alt"></i>LogOut</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">

        <?php echo $datas; ?>
    </div>

</body>
</html>


  <script>
  $('#logOut').on('click', function(e){
    e.preventDefault();
    const { value: accept } = await Swal.fire({
      title: 'Terms and conditions',
      input: 'checkbox',
      inputValue: 1,
      inputPlaceholder:
        'I agree with the terms and conditions',
      confirmButtonText:
        'Continue<i class="fa fa-arrow-right"></i>',
      inputValidator: (result) => {
        return !result && 'You need to agree with T&C'
      }
    })

    if (accept) {
      Swal.fire('You agreed with T&C :)');
    }
  });

  
  </script>


<!--###############################################################################################################-->


<div class="modal fade" id="modalAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="index.php?controller=user&action=admin" method="POST" name="vform">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Administrateur</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
        <button type="submit" name="admin" class="btn btn-indigo">Login<i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
    </form>
    </div>
  </div>
</div>
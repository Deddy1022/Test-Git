<?php include "lettre.php";

?>
<!-- Central Modal Small -->
<div  tabindex="">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class=" modal-fluid" >
<?php foreach ($donnees['Facture'] as $d) { ?>

    <div>
      <div class="modal-body">

        <div id="facture">
        <section class="form-gardient classGardient">
          <div id="form" class="container">
          <div align="right"><img src="image/dssi.png"></div>
          <div align="center"><b class="h4 mb-4 text-center">DATE: <?php echo $d['date_achat'] ?></b></div>
        
            <div class="md-form form-sm">
              Client:
              <span><b><?php echo $d['id_client'] ?></b></span>
            </div>

            <div class="md-form form-ms">
              Nom:
              <?php foreach ($donnees['Client'] as $key) { ?>
              <span><b><?php echo $key['nom_cli']; ?> <?php echo $key['prenom_cli'] ?></b></span>
              <?php } ?>
              <label for="materialFormEmailModalEx1"></label>
            </div>
          </div>


        </section>

        <table class="table table-inverse grade">
          <thead>
            <tr>
              <th scope="row">0</th>
              <th>Libelle</th>
              <th>P.U</th>
              <th>Qte</th>
              <th>Somme</th>
            </tr>

          </thead>
          
          <?php foreach ($donnees['Vente'] as $k) {?>
            
          <tbody class="td">
            <tr>
              <th scope="row"></th>
              <td><?php echo $k['nomart'];; ?>
              </td>
              <td><?php echo $k['prix_vente']; ?></td>
              <td><?php echo $k['quantite']; ?>     
              </td>
              <td><?php echo $k['prix_achat']; ?></td>
              <td></td>
            </tr>
        <?php } ?>
        <?php foreach ($donnees['Total'] as $key) { ?>
          </tbody>
          <tfoot>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><b>ToTal:</b></td>
              <td><b style="color:red;" date-id="sum_achat"><?php echo $key['sum_achat'] ?></b></td>
            </tr>
          </tfoot>
        </table>
        <?php $mess=new ChiffreEnLettre();
        $mess=$mess->Conversion($key['sum_achat']);?>
          <p><strong style="color:green;"><i><u>Sous la somme de :</u></i></strong> <strong><em><?php echo $mess; ?> ARIARY</em></strong></p>
        <?php } ?>

        <?php } ?>
        </div>
        <div align="center">
          <button type="button" id="button_print" class="btn btn-black" onclick="window.print();">
            <i id="size" class="fas fa-cart-plus prefix white-text"></i>Facturer
          </button>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Central Modal Small -->

    <script>
/*var i = 0;
$("button").on('click', function(){
    i++;
    $("#container").append('<div align="center"<form id="row'+i+'"><div class="md-form form-ms"><input type="text" name="nomart" class="form-control"><br><br><label for="materialFormCardEmailEx" class="font-weight-light">Nom Article</label><br></div><button name="remove" id="'+i+'" class="btn btn-danger btn_remove" type="submit">X</button><br><br></div>');

    $(document).on('click', '.btn_remove', function(){
      var button_id = $(this).attr("id")
      $('#row'+button_id+'').remove();
    });
});*/

$(document).ready(function(){

  var specialElementHandlers = {
    '#editor':function(element, renderer){
      return true;
    }
  };

  $('#button').click(function(){

    var doc = new jsPDF();

    doc.fromHTML($('#id_client').html(),15,15,{
      'width':170,
      'elementHandlers':specialElementHandlers
    });

    doc.save("facturation.pdf");
  });

  $(document).ready(function(){
    var i = document.getElementById("numero"), myStringSerial = "0123456789", serialKey = '', counter = math.pow(myStringSerial.length, 4);

    for( var i=0; i<counter; i++){
      for(var j=0; j<4; j++){
        serialKey += myStringSerial[Math.floor(Math.random()*5)];
        if (j==1 || j == 2 || j == 4) {
          serialKey = '-';
        }
      }
      console.log(serialKey);
      serialKey ='';
    }
  });

});


</script>
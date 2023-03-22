<html>


</body>

<table class="table table-hover">
  <thead class="blue-grey black-text">
      <tr>
        <th scope="col">Fournisseur</th>
        <th scope="col">Quantite Acheter</th>
        <th scope="col">Total en Stock</th>
        <th scope="col">Prix Unitaire</th>
        <th scope="col">Prix Total</th>
        <th scope="col">Prix en Vente</th>
        <th><form class="form-inline"><input class="form-control search_appro" type="date" placeholder="Search" aria-label="Search" id="datepicker"></form></th>
        <th> <button type="button" class="close" data-dismiss="modal"><a href="?controller=article&action=index&view=index"><span aria-hidden="true"><i class="fas fa-backward"></i></span></a></button></th>
      </tr>
  </thead>
<?php foreach ($donnees['Article'] as $d) { ?><?php foreach ($donnees['Appro'] as $k) { ?>
<tbody class="liste_appro">
  <tr>
    <td id="fournisseur"><?php echo $k['fournisseur']; ?></td>
    <td id="qte"><?php echo $k['qte']; ?></td>
    <td id="qte_article"><?php echo $d['qte_article']; ?></td>
    <td id="prix_unitaire"><?php echo $k['prix_unitaire']; ?></td>
    <td id="prix_unitaire"><?php echo $k['prix_total']; ?></td>
    <td id="prix_unitaire"><?php echo $d['prix_vente']; ?></td>
    <td><b class="h4 mb-4 text-center"><?php echo $k['date']; ?></b></td>
    </div>
      
  </tr>
</tbody>
<?php
}

?><?php
}

?>
</table>


</html>

<script>
$('.search_appro').keyup(function(){
  search_table($(this).val());
});

function search_table(value){
  $('.liste_appro tr').each(function(){
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
</script>
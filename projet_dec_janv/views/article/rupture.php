<table class="table table-hover">
	<thead class="green black-text">
    <div><h1>Nombre En Stock: <span><?php echo $donnees['countrupture'] ?></span></h1></div>
		<tr>
			<th scope="col">ID</th>
      <th scope="col">Nom Article</th>
      <th scope="col">
        <input class="form-control my-0 py-1 lime-border" name="search" id="search_article" type="text" placeholder="Search..." aria-label="Search">   
      </th>
      <th> <button type="button" class="close" data-dismiss="modal"><a href="index.php?controller=article&action=index&view=index"><span aria-hidden="true"><i class="fas fa-backward"></i></span></a></button></th>
		</tr>
	</thead>

<?php
foreach($donnees["rupture"] as $d){
?>
  <tbody class="liste_article">
    <tr>
      <td class="article"><?php echo $d['id_article']; ?></td>
      <td class="article"><?php echo $d['nomart']; ?></td>
      <td class="article"><i style="color:#BEBEBE;">rupture de stock</i></td>
      <td></td>
    </tr>
  </tbody>
<?php } ?>
</table>
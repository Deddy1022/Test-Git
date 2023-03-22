<?php
class facturecontroller{
	public $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function indexAction(){
		if ($_GET['id_client'] && $_GET['date_achat']) {
			$id_client=$_GET['id_client'];
			$date_achat=$_GET['date_achat'];
			$facture=new facture($this->db);
			$Facture=$facture->facturer($id_client, $date_achat);

			$client=new client($this->db);
			$Client=$client->selecting($id_client);
			//var_dump($Client);die();
			$vendre=new vendre($this->db);
			$Vendre=$vendre->selecting();

			$vendre=new vendre($this->db);
			$Vente=$vendre->listing($id_client, $date_achat);

			$vendre=new vendre($this->db);
			$Total=$vendre->total($id_client, $date_achat);
			//var_dump($Facture);die();
			
		}
		return array( 'Facture' => $Facture, 'Client' => $Client, 'Vendre' => $Vendre, 'Vente' => $Vente, 'Total' => $Total );
	}
}
?>
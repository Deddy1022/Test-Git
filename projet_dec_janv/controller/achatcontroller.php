<?php
class achatcontroller{
	public $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function indexAction(){

        $client=new client($this->db);
        $Client=$client->liste();

        $article=new article($this->db);
        $Article=$article->liste();

        $vendre=new vendre($this->db);
        $Vendre=$vendre->selecting();

		$achat=new achat($this->db);
		$Achat=$achat->liste();

		return array( 'Achat' => $Achat, 'Article' => $Article, 'Client' => $Client, 'Vendre' => $Vendre );
	}

	public function ajoutAction(){

        if (isset($_POST['insert'])) {
            $id_client=$_POST['id_client'];
            $id_article=$_POST['id_article'];
            $quantite=$_POST['quantite'];
            $date_achat=$_POST['date_achat'];
            $prix_vente=$_POST['prix_vente'];
            $date_achat=$_POST['date_achat'];
            //var_dump($id_article);
            //var_dump($quantite);die();

           
            //if () {
              //  return false;
            if (isset($id_client) && isset($id_article) && isset($quantite) && isset($date_achat) && isset($prix_vente) && isset($date_achat) && !empty($id_client) && !empty($id_article) && !empty($quantite) && !empty($date_achat) && !empty($prix_vente) && isset($prix_vente)!=0) {

                $count = count($id_article);
                $vendre = new vendre($this->db);
                $achat=new achat($this->db);
                
                $i=0;
                while($i<$count && $prix_vente>0){
                    $Vendre=$vendre->insert($id_client, $id_article[$i], $quantite[$i], $prix_vente[$i], $date_achat);
                    $exist=$achat->subquantite($id_client, $id_article[$i], $quantite[$i]);
                    $i++;
                }
                $Achat=$achat->insert($id_client, $date_achat);
                
                header("location:index.php?controller=achat&action=index");
                   

            }
            
            
    	}
    	return $this->indexAction();
    }

    public function updateAction(){
        if(isset($_POST['update'])){
            $id_client = $_POST['id_client'];
            $date_achat = $_POST['date_achat'];
            $achat = new achat($this->db);
            $achat->change($id_client, $date_achat);
            $vendre = new vendre($this->db);
            $vendre->change($id_client, $date_achat);
            header('location:index.php?controller=achat&action=index');
        }
        return $this->indexAction();
    }

	public function deleteAction(){
        if (isset($_POST['deletedata'])) {

            $id_client=$_POST['id_client'];
            $date_achat=$_POST['date_achat'];

            $achat=new achat($this->db);
            $e=$achat->erase($id_client, $date_achat);
            //var_dump($e);
            //die();
            $vendre=new vendre($this->db);
            $e=$vendre->erase($id_client, $date_achat);
        }
        return $this->indexAction();   
    }

}
?>
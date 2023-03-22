<?php

class approcontroller{
	public $db;

	public function __construct($db){
        
        $this->db = $db;
    }

    public function indexAction(){

        $article=new article($this->db);
        $Article=$article->liste();

        $fournisseur=new fournisseur($this->db);
        $Fou=$fournisseur->liste();

        $appro=new appro($this->db);
        $Appro=$appro->liste();

        $price=new price($this->db);
        $Price=$price->liste();
        return array( 'Appro' => $Appro, 'Article' => $Article, 'Fou' => $Fou, 'Price' => $Price );
    }

	public function ajoutAction(){
        if (isset($_POST['insert'])) {
            $id_article=$_POST['id_article'];
            $date=$_POST['date'];
            $fournisseur=$_POST['id_fou'];
            $qte=$_POST['qte'];
            $prix_unitaire=$_POST['prix_unitaire'];
            $prix_total='';

            if (empty($id_article) && empty($id_appro) && empty($date) && empty($fournisseur)) {
                header('location:index.php?controller=appro&action=ajout');
            }
            else{
                if (isset($id_article) && isset($date) && isset($fournisseur) && isset($qte) && isset($prix_unitaire) && !empty($id_article) && !empty($date) && !empty($fournisseur)){
                    $appro=new appro($this->db);
                    $e=$appro->insert($id_article, $date, $fournisseur, $qte, $prix_unitaire, $prix_total);
                    $appro=new appro($this->db);
                    $ext=$appro->addstock($date, $fournisseur,$qte,$id_article);
                    $article=new article($this->db);
                    $ex=$article->prixVente( $prix_unitaire,$id_article);
                    //var_dump($e);
                    //var_dump($ext);var_dump($ex); die();
                    //$appro=new appro($this->db);
                    
                    header('location:index.php?controller=article&action=index&view=index');
                }
            }
        }
        return $this->indexAction();
	}

}



?>

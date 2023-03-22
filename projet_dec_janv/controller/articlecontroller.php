<?php

class articlecontroller{
	public $db;

    public function __construct($db){
        
        $this->db = $db;
    }


    public function indexAction(){
        
        $article=new article($this->db);
        $Article=$article->liste();

        $article=new article($this->db);
        $Id_Article=$article->selectId();

        $article=new article($this->db);
        $rupture=$article->rupture();

        $fournisseur=new fournisseur($this->db);
        $Fou=$fournisseur->liste();

        $appro=new appro($this->db);
        $Appro=$appro->liste();

        $price=new price($this->db);
        $Price=$price->afficher();
        return array( 'Article' => $Article, 'Appro' => $Appro , 'Fou' => $Fou, 'Price' => $Price, 'Id_Article' => $Id_Article, 'rupture' => $rupture, "countrupture" => count($rupture), 'Count' => count($Article) );
    }

    public function ajoutAction(){
        
        
        
    	if (isset($_POST['insert'])) {
            $id_article=$_POST['id_article'];
            $nomart=$_POST['nomart'];


            if (empty($id_article) && empty($nomart)) {
               header('location:index.php?controller=article&action=ajout');
	        }else{
                if (isset($id_article) && isset($nomart)){
                    
                    $article=new article($this->db);
                    $e=$article->insert($id_article, $nomart);
    	        	//var_dump($e);die();
                    header('location:index.php?controller=article&action=index&view=index');
                }
	        }
        }

        return $this->indexAction();
    }

    public function updateAction(){
        if(isset($_POST['update'])){
            $id_article=$_POST['id_article'];
            $nomart=$_POST['nomart'];
            $article=new article($this->db);
            $article->change($id_article, $nomart);
        }
        return $this->indexAction();
    }

    public function deleteAction(){
        if (isset($_POST['deletedata'])) {

            $id_article=$_POST['id_article'];

            $article=new article($this->db);
            $article->erase($id_article);
            $appro=new appro($this->db);
            $appro->erase($id_article);  
        }
        return $this->indexAction();
    }

    public function detailAction(){
        if ($_GET['id_article']) {

            $id_article=$_GET['id_article'];

            $appro=new appro($this->db);
            $Appro=$appro->selecting($id_article);

            $article=new article($this->db);
            $Article=$article->selecting($id_article);   
        }
        return array('Appro' => $Appro, 'Article' => $Article );
    }

    public function ruptureAction(){
        return $this->indexAction();
    }
}
?>



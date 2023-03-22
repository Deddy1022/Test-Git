<?php
class fournisseurcontroller{
	public $db;

    public function __construct($db){
        
        $this->db = $db;
    }

    public function indexAction(){
    	$fournisseur=new fournisseur($this->db);
        $Fou=$fournisseur->liste();

        $fournisseur=new fournisseur($this->db);
        $Id_Fou=$fournisseur->selectId();
        return array( 'Fou' => $Fou, 'CountFou' => count($Fou), 'Id_Fou' => $Id_Fou );
    }

    public function ajoutAction(){
    	if (isset($_POST['insert'])) {
            $id_fou=$_POST['id_fou'];
    		$nom_fou=$_POST['nom_fou'];
    		$adresse_fou=$_POST['adresse_fou'];
            $contact=$_POST['contact'];


    		if (empty($id_fou) && empty($nom_fou) && empty($adresse) && empty($contact)) {
                header('location:index.php?controller=fournisseur&action=ajout');
    		}else if (isset($id_fou) && isset($nom_fou) && isset($adresse_fou) && isset($contact) && !empty($id_fou) && !empty($nom_fou) && !empty($adresse_fou) && !empty($contact)) {
    			$fournisseur=new fournisseur($this->db);
    			$fournisseur->insert($id_fou, $nom_fou, $adresse_fou, $contact);
                header("location:index.php?controller=fournisseur&action=index&view=index");
                
            }
            
    	}
    	return $this->indexAction();
    }

    public function updateAction(){
        if (isset($_POST['update'])) {
            $id_fou=$_POST['id_fou'];
            $nom_fou=$_POST['nom_fou'];
            $adresse_fou=$_POST['adresse_fou'];
            $contact=$_POST['contact'];

            if (isset($nom_fou) && isset($adresse_fou) && isset($contact) && !empty($nom_fou) && !empty($adresse_fou)) {
                $fournisseur=new fournisseur($this->db);
                $exist=$fournisseur->change($id_fou, $nom_fou, $adresse_fou, $contact);
                //var_dump($exist);die();
                header('location:index.php?controller=fournisseur&action=index&view=index');
            }
        }
        return $this->indexAction();
    }

    public function deleteAction(){
        if (isset($_POST['deletedata'])) {

            $id_fou=$_POST['id_fou'];

            $fournisseur=new fournisseur($this->db);
            $e=$fournisseur->erase($id_fou);
            //var_dump($e);
            //die();
        }
        return $this->indexAction();   
    }


    /*public function updateAction(){

        if(isset($_GET['id_client'])){
            $id = $_GET['id_client'];
            //var_dump($id);
            $client = new client($this->db);
            return $client->selectId($id);   
            
        } 
        if(isset($_POST['modify'])){
            $id = $_POST['id_client'];
            //var_dump($_POST);
            $nom = $_POST['nom'];
            $contact = $_POST['contact'];
            $adresse = $_POST['adresse'];
            $client = new client($this->db);
            $client->ajour($id ,$nom, $adresse, $contact);  
            return $this->indexAction();
          
        }

    }*/
}
<?php

class clientcontroller{
	public $db;

    public function __construct($db){
        
        $this->db = $db;
    }


    public function indexAction(){
        $client=new client($this->db);
        $Client=$client->liste();

        $client=new client($this->db);
        $ID=$client->selectId();
        return array( 'Client' => $Client, 'CountClient' => count($Client), 'ID' => $ID ); 
    }

    public function ajoutAction(){
        
        if (isset($_POST['insert'])) {
            $id_client=$_POST['id_client'];
            $nom_cli=$_POST['nom_cli'];
            $prenom_cli=$_POST['prenom_cli'];
            $adresse_cli=$_POST['adresse_cli'];

            if (empty($id_client) && empty($nom_cli)) {
               header('location:index.php?controller=client&action=ajout');
            }else{
                if (isset($id_client) && isset($nom_cli) && isset($prenom_cli) && isset($adresse_cli)){
                    
                    $client=new client($this->db);
                    $e=$client->insert($id_client, $nom_cli, $prenom_cli, $adresse_cli);
                    //var_dump($e);die();
                    header('location:index.php?controller=client&action=index&view=index');
                }
            }
        }

        return $this->indexAction();
    }


    public function updateAction(){
        if(isset($_POST['update'])){
            $id = $_POST['id_client'];
            $nom_cli = $_POST['nom_cli'];
            $prenom_cli = $_POST['prenom_cli'];
            $adresse_cli = $_POST['adresse_cli'];
            $client = new client($this->db);
            $client->change($id ,$nom_cli, $prenom_cli, $adresse_cli);
            header('location:index.php?controller=client&action=index&view=index'); 
            return $this->indexAction();
          
        }

    }

    public function deleteAction(){
        if (isset($_POST['deletedata'])) {

            $id_client=$_POST['id_client'];

            $client=new client($this->db);
            $client->erase($id_client);  
        }
        return $this->indexAction();
    }

    

}
?>



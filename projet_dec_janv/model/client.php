<?php
class client{
	protected $db;

	public function __construct($db){
        $this->db=$db;
    }

    public function liste(){
        return $data=$this->db->read("client");
    }

    public function insert($id_client, $nom_cli, $prenom_cli, $adresse_cli){

        $client = ['id_client'=>$id_client, 'nom_cli'=>$nom_cli, 'prenom_cli'=>$prenom_cli, 'adresse_cli'=>$adresse_cli];

        $sql="INSERT INTO client (id_client, nom_cli, prenom_cli, adresse_cli) VALUES (:id_client, :nom_cli, :prenom_cli, :adresse_cli)";echo $sql;

        return $this->db->get($sql, $client);
    }

    public function selecting($id_client){
        $sql = "SELECT nom_cli, prenom_cli FROM client WHERE id_client = '$id_client'";
        return $this->db->select($sql);
    }

    /*public function insert($id_client, $nom_cli, $prenom_cli, $adresse_cli){

        $client = ['id_client' => $id_client, 'nom_cli' => $nom_cli, 'prenom_cli' => $prenom_cli, 'adresse_cli' => $adresse_cli];

        $sql= "INSERT INTO client (id_client, nom_cli, prenom_cli, adresse_cli) VALUES (:id_client, :nom_cli, :prenom_cli, :adresse_cli)";

    	return $data=$this->db->get($sql, $client);
    }*/

    public function selectId(){
        $sql = "SELECT * FROM client ORDER BY id_client DESC LIMIT 1";
        return $this->db->select($sql);
    }

    public function change($id_client, $nom_cli, $prenom_cli, $adresse_cli){
        $client = [ 'nom_cli' => $nom_cli, 'prenom_cli' => $prenom_cli, 'adresse_cli' => $adresse_cli ];
        $sql = "UPDATE client SET nom_cli = :nom_cli, prenom_cli = :prenom_cli, adresse_cli = :adresse_cli  WHERE id_client = '$id_client'";
        return $this->db->get($sql, $client);
    }

    public function erase($id_client){
        $sql="DELETE FROM client WHERE id_client='$id_client' ";
        return $this->db->supprimer($sql);
    }

}
?>
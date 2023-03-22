<?php
class fournisseur{
	protected $db;
    
    public function __construct($db){
        $this->db=$db;
    }

    public function liste(){
        return $data=$this->db->read("fournisseur");
    }

    public function insert($id_fou, $nom_fou, $adresse_fou, $contact){
    	$fournisseur = ['id_fou' => $id_fou, 'nom_fou' => $nom_fou, 'adresse_fou' => $adresse_fou, 'contact' => $contact];
        
    	$sql="INSERT INTO fournisseur (id_fou, nom_fou, adresse_fou, contact) values (:id_fou, :nom_fou, :adresse_fou, :contact)";
    	return $this->db->get($sql, $fournisseur);
    }

    public function selectId(){
        $sql = "SELECT * FROM fournisseur ORDER BY id_fou DESC LIMIT 1 ";
        return $this->db->connection($sql);
    }

    public function change($id_fou, $nom_fou,$adresse_fou, $contact){
        $fournisseur = [ 'nom_fou' => $nom_fou, 'contact' => $contact, 'adresse_fou' => $adresse_fou ];
        $sql = "UPDATE fournisseur SET nom_fou=:nom_fou, adresse_fou=:adresse_fou, contact=:contact WHERE id_fou='$id_fou'";
        return $this->db->inserer($sql, $fournisseur);
    }

    public function erase($id_fou){
        $sql = "DELETE FROM fournisseur where id_fou='$id_fou'";
        return $this->db->supprimer($sql);
    }
}

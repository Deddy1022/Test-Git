<?php

class vendre{
	protected $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function liste(){
		return $data=$this->db->read("vendre");
	}

	public function listing($id_client, $date_achat){
        $sql = "SELECT `nomart`, `prix_vente`,`quantite`, `prix_achat` FROM `article`, `vendre` WHERE id_client='$id_client' AND date_achat='$date_achat' AND vendre.id_article=article.id_article";
        return $this->db->select($sql);
    }

	public function selecting(){
        $sql = "SELECT `nomart`, `prix_vente`,`quantite`, `prix_achat` FROM `article`, `vendre`, `achats` WHERE article.id_article=vendre.id_article AND achats.id_client=vendre.id_client LIMIT 1";
        return $this->db->select($sql);
    }

    public function total($id_client, $date_achat){
    	$sql="SELECT sum(prix_achat) as sum_achat FROM vendre where id_client='$id_client' AND date_achat = '$date_achat'";
    	return $this->db->select($sql);
    }


	public function insert($id_client, $id_article, $quantite, $prix_vente, $date_achat){

		$vendre=['id_client' => $id_client, 'id_article' => $id_article, 'quantite' => $quantite, 'prix_vente' => $prix_vente, 'date_achat' => $date_achat ];
        $sql="INSERT INTO vendre (id_client, id_article, quantite, prix_achat, date_achat) VALUES (:id_client, :id_article, :quantite, :prix_vente*:quantite, :date_achat)";
        return $this->db->inserer($sql, $vendre);
	}

    public function change($id_client, $date_achat){
        $vendre=[ 'date_achat' => $date_achat ];
        $sql="UPDATE vendre SET date_achat=:date_achat WHERE id_client='$id_client' ";
        return $this->db->get($sql, $vendre);
    }

	public function erase($id_client, $date_achat){
        $sql = "DELETE FROM vendre where id_client='$id_client' AND date_achat='$date_achat'";

        return $data=$this->db->supprimer($sql);
    }
}

?>
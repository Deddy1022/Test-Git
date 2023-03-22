<?php
class achat{
	protected $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function liste(){
		return $this->db->read("achats");
	}

	 public function insert($id_client, $date_achat){
	 	
        $achat=[ 'id_client' => $id_client, 'date_achat'=> $date_achat ];

        $sql="INSERT INTO achats (id_client, date_achat) VALUES (:id_client, :date_achat)";

        return $this->db->get($sql, $achat);
    }

    public function selecting(){
        $sql = "SELECT `nomart`, `quantite` FROM `article`, `vendre`, `achats` WHERE  achats.id_client=vendre.id_client AND vendre.id_article=article.id_article ";
        return $this->db->select($sql);
    }

	public function subquantite($id_client, $id_article, $quantite){

		$vendre = ['id_client' => $id_client, 'id_article' => $id_article, 'quantite' => $quantite ];
        $sql="UPDATE article SET qte_article= qte_article - '$quantite' WHERE id_article = '$id_article'";
        return $this->db->get($sql, $vendre);
	}

    public function change($id_client, $date_achat){
        $achats = [ 'date_achat' => $date_achat ];

        $sql = "UPDATE achats SET date_achat= :date_achat WHERE id_client= '$id_client'";
        return $this->db->get($sql, $achats);
    }

	public function erase($id_client, $date_achat){
        $sql = "DELETE FROM achats where id_client='$id_client' AND date_achat = '$date_achat'";

        return $data=$this->db->supprimer($sql);
    }
}
?>
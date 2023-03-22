<?php 

class appro{
    protected $db;
    
    public function __construct($db){
        $this->db=$db;
    }


    public function liste(){
        return $data=$this->db->read("approvisionnement");
    }

    public function insert($id_article, $date, $fournisseur, $qte, $prix_unitaire, $prix_total){

        $appro = [ 'id_article' => $id_article, 'date'=>$date, 'fournisseur' => $fournisseur, 'qte' => $qte, 'prix_unitaire' => $prix_unitaire, 'prix_total' => $prix_total ];
        $sql="INSERT INTO approvisionnement (id_article, date, fournisseur, qte, prix_unitaire, prix_total ) VALUES (:id_article, :date, :fournisseur, :qte, :prix_unitaire, :prix_unitaire*:qte)";
        return $data=$this->db->get($sql, $appro);
    }

    /*public function inserer($prix_unitaire, $id_article, $qte){
        $appro=['qte' => $qte ];
        $sql="UPDATE approvisionnement SET prix_total=$prix_unitaire*$qte";echo $sql;
        return $this->db->get($sql, $appro);
    }*/

    public function selecting($id_article){
        $sql="SELECT * FROM approvisionnement WHERE
        id_article='$id_article' ";
        return $this->db->select($sql);
    }


    public function addstock($date, $fournisseur,$qte, $id_article){
        $appro = [ 'date'=>$date, 'fournisseur'=>$fournisseur, 'qte' => $qte ];
        $sql="UPDATE article SET qte_article= qte_article+ '$qte' WHERE id_article = '$id_article'";
        echo $sql;
        return $this->db->get($sql, $appro);
    }

    public function erase($id_article){
        $sql="DELETE FROM approvisionnement where id_article='$id_article'";

        return $data=$this->db->supprimer($sql);
    }
}
?>
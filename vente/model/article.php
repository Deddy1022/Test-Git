<?php 

class article{
    protected $db;
    
    public function __construct($db){
        $this->db=$db;
    }


    public function liste(){
        return $this->db->read("article");
    }

    public function insert($id_article,$nomart){

        $article = [ 'id_article' =>$id_article, 'nomart'=>$nomart];
        $sql="INSERT INTO article (id_article, nomart) VALUES (:id_article, :nomart)";
        echo $sql;
        return $data=$this->db->get($sql, $article);
    }

    public function substock($quantite, $id_article){
        $article=['$quantite' => $quantite, 'id_article' => $id_article ];
        $sql="UPDATE article SET qte_article= qte_article - '$quantite' WHERE id_article = '$id_article'";
        return $this->db->update($sql, $article);
    }

    public function prixVente($prix_unitaire,$id_article){
        $article=['$prix_unitaire' => $prix_unitaire, 'id_article' => $id_article ];
        $sql="UPDATE article SET prix_vente=$prix_unitaire+$prix_unitaire*0.2 WHERE id_article = '$id_article'";
        return $this->db->get($sql, $article);
    }

    public function selecting($id_article){
        $sql="SELECT qte_article, prix_vente FROM article WHERE id_article='$id_article'";
        return $this->db->select($sql);
    }

    /*public function selecting(){
        $sql="SELECT date, fournisseur, qte, qte_article, prix_unitaire, prix_total FROM approvisionnement, article WHERE approvisionnement.id_article=article.id_article";
        return $this->db->select($sql);
    }*/

    public function selectId(){
        $sql = "SELECT * FROM article ORDER BY id_article DESC LIMIT 1";
        return $this->db->select($sql);
    }


    public function rupture(){
        $sql="SELECT * FROM article where qte_article=0";
        return $this->db->select($sql);
    }

    public function change($id_article, $nomart){

        $article = [ 'nomart' => $nomart ];

        $sql = "UPDATE article SET nomart= :nomart WHERE id_article= '$id_article'";
        return $this->db->get($sql, $article);
    }

    public function erase($id_article){
        $sql = "DELETE FROM article where id_article='$id_article'";

        return $this->db->supprimer($sql);
    }
}
?>
<?php
class price{
	protected $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function liste(){
		return $this->db->read("price");
	}

	public function afficher(){
		$sql="SELECT nomart, prix_unitaire FROM price, article WHERE price.id_article=article.id_article";
		return $this->db->select($sql);
	}
}

?>
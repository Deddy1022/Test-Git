<?php
class facture{
	protected $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function liste(){
		return $data=$this->db->read("facture");
	}

	public function facturer($id_client, $date_achat){
        $sql="SELECT id_client, date_achat FROM achats WHERE id_client='$id_client' AND date_achat='$date_achat' ";
        return $this->db->select($sql);
	}
}
?>
<?php
class connexion{
	public $server='root';
	public $host='localhost';
	public $pass='';
	public $database='projet_dec_janv';

	public $pdo;

	public function __construct(){
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;

		try {
			 $this->pdo = new PDO($dsn, $this->server, $this->pass);
		}

		catch (PDOException $e) {
			throw new exception ($e->getMessage());
		}
	}

	public function connection($sql){
		$content = $this->pdo->query($sql);
        $this->data=array();
        while($row = $content->fetch()){
            $this->data[]=$row;
        }
        return $this->data;
	}

    public function select($sql){
        $content = $this->pdo->query($sql);
        $this->data=array();
        while($row = $content->fetch()){
            $this->data[]=$row;
        }
        return $this->data;
    }

	public function read($table){
        $content = $this->pdo->query("SELECT * FROM " . $table);
        $this->data=array();
        while($row = $content->fetch()){
            $this->data[]=$row;
        }
        return $this->data;
    }

    public function get($sql, $data){
    	$stmt=$this->pdo->prepare($sql);
    	return $stmt->execute($data);
    }

    public function inserer($sql, $data){
        $stmt=$this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public function supprimer($sql){
    	$stmt=$this->pdo->prepare($sql);
    	return $stmt->execute();
    }
}


?>
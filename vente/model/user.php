<?php 
class user{
    protected $db;
    
    public function __construct($db){
        $this->db=$db;
    }


    public function liste(){
        return $this->db->read("user");
    }

    public function login($password, $email){
        $sql= "SELECT password, email FROM user where password='$password' AND email='$email' ";
        return $this->db->connection($sql);
    }

    public function loginadmin($email, $password){
        $sql="SELECT * FROM user WHERE email='$email' AND password='$password' ";
        return $this->db->select($sql);
    }

    public function insert($nom, $prenom, $password, $email, $tel){
        

        $user = ['nom' => $nom, 'prenom' => $prenom, 'password' => $password, 'email' => $email, 'tel' => $tel];

        $sql="INSERT INTO user (nom, prenom, password, email, tel) VALUES (:nom, :prenom, :password, :email, :tel)";
        return $this->db->get($sql, $user);
    }

    public function selectId($id){
        $sql = "SELECT * FROM user WHERE id = '$id'";
        return $this->db->connection($sql);
    }
    public function resetId(){

        $sql="SET @auto:=0; UPDATE user SET id = @auto :=(@auto+1); ALTER TABLE user Auto_INCREMENT=1";
        return $this->db->select($sql);
    }

    public function change($id, $new_password){

        $user = ['new_password' => $new_password];
        $sql = "UPDATE user SET password=:new_password WHERE id='$id' ";
        return $this->db->get($sql, $user);
    }

    public function erase($id){
        $sql = "DELETE FROM user where id='$id'";

        return $this->db->supprimer($sql);
    }
   
}
?>
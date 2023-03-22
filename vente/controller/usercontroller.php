<?php

class usercontroller{
	public $db;

    public function __construct($db){
        
        $this->db = $db;
    }


    public function indexAction(){
        $user=new user($this->db);
        $User=$user->liste();
        return array( 'User' => $User, "nombreUser" => count($User) );
    }

    public function ajoutAction(){
        if (isset($_POST['insert'])) {
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $password=$_POST['password'];
            $confirm=$_POST['confirm_password'];
            $email=$_POST['email'];
            $tel=$_POST['tel'];

            if (empty($nom) && empty($prenom) && empty($password) && empty($email) && empty($tel)) {
                return false;
            }
            else if (isset($nom) && isset($prenom) && isset($password) && isset($email) && isset($tel) && !empty($nom) && !empty($prenom) && !empty($password) && !empty($email) && !empty($tel)){
                if ($password!=$confirm) {
                    return false;
                }else{
                    if ($password == $confirm) {
                        $user=new user($this->db);
                        $user->insert($nom, $prenom, $password, $email, $tel);
                        $e=$user->resetId();
                        header('location:index.php?controller=user&action=login');
                    }
                    
                }
            }
            
        }
        return $this->indexAction();
    }

    public function addAction(){
        if (isset($_POST['insert'])) {
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $password=$_POST['password'];
            $confirm=$_POST['confirm_password'];
            $email=$_POST['email'];
            $tel=$_POST['tel'];

            if (empty($nom) && empty($prenom) && empty($password) && empty($email) && empty($tel)) {
                return false;
            }
            else if (isset($nom) && isset($prenom) && isset($password) && isset($email) && isset($tel) && !empty($nom) && !empty($prenom) && !empty($password) && !empty($email) && !empty($tel)){
                   header('location:index.php?controller=user&action=index'); 
                if ($password!=$confirm) {
                    return false;
                }else{
                    if ($password == $confirm) {
                        $user=new user($this->db);
                        $user->insert($nom, $prenom, $password, $email, $tel);
                        $e=$user->resetId();
                        header('location:index.php?controller=user&action=index');
                    }
                    
                }
            }
            
        }
        return $this->indexAction();
    }

    public function loginAction(){
        if (isset($_POST['login'])) {
            $password=$_POST['password'];
            $email=$_POST['email'];
            $message='';

            $user=new user($this->db);
            $exist=$user->login($password, $email);
            //var_dump($exist);
            //die();
            if (empty($password) && empty($email)) {
                return false;
            }else{
                if (count($exist)==0) {
                    return false;
                }else{
                    header('location:index.php?controller=client&action=index&view=index');
                 }
            }
        }
        
    }

    public function adminAction(){
        if (isset($_POST['admin'])) {
            $password=$_POST['password'];
            $email=$_POST['email'];
            $user=new user($this->db);
            $exist=$user->loginadmin($email, $password);

            if($email!='putemalhere' && $password!='passwordhere'){
                return false;
            }elseif ($email=='putemalhere' && $password=='passwordhere') {
                header("location:index.php?controller=user&action=index&view=index");
            }

            
        }
        
    }

    /*public function updateAction(){
        if($_GET['id']){
            if(isset($_POST['update'])){
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $password=$_POST['password'];
                if (!empty($nom) && !empty($prenom) && !empty($password)) {
                        $user=new user($this->db);
                        $user->change($nom, $prenom, $password);
                }
            }
        }

        return $this->indexAction();
    }*/

    public function deleteAction(){
        if (isset($_POST['deletedata'])) {
            $id=$_POST['id'];

            $user=new user($this->db);
            $ex=$user->erase($id);
            $user=new user($this->db);
            $e=$user->resetId();
        }
        return $this->indexAction();
    }


    public function updateAction(){
        if(isset($_POST['update'])){
            $id=$_POST['id'];
            $email = $_POST['email'];
            $new_password = $_POST['new_password'];
            $password = $_POST['password'];
            $confirm_new_password = $_POST['confirm_new_password'];
            $user = new user($this->db);
            if ($new_password!=$confirm_new_password) {
                header('location:index.php?controller=user&action=index');
            } else if($new_password == $confirm_new_password){
                $e=$user->change($id, $new_password);
                header('location:index.php?controller=user&action=index');
            }
            return $this->indexAction();
          
        }

    }

}
?>
<?php

declare(strict_types=1);

class User{

    private PDO $pdo;

    public function __counter(){
        $this->pdo = DB::connect();
    }

    public function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $db     = DB::connect();
        $stmt   = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user'] = $user['email'];
            header('Location: /');
            exit();
        }

        $_SESSION['message']['error'] = 'Wrong email or password';
        header('Location: /login');

    }

    public function logout(){
        session_destroy();
        header('Location: /');
        exit();
    }

    
    public function register(){
        if($this->isUserExists()){
            echo "User already exists";
            return;
        }
        $user = $this->create();
        $_SESSION['user'] = $user['email'];
        header('Location: /');
    }
    
    public function isUserExists():bool{
        if(isset($_POST['email'])){
            $email  = $_POST['email'];
            $db     = DB::connect();    
            $stmt   = $db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(":email",$email);
            $stmt->execute();
            return (bool) $result = $stmt->fetch();

        }
        return false;
    }

    public function create(){
        if(isset($_POST['email']) && isset ($_POST['password'])){
            $email    = $_POST['email'];
            $password = $_POST['password'];
            $db     = DB::connect();
            $stmt   = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute(); 

            return $stmt->fetch(PDO::FETCH_ASSOC);

        }
    }
   
} 
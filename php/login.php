<?php

include 'connect.php';

class SubmitUser {

    private $pdo;
    private $data;
   
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->data = $_POST;
    }

    public function sanitize($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    public function insertUser() {
        $username = $this->sanitize($this->data['username']);
        $passwd = $this->sanitize($this->data['password']);

        try {

            $stmt = $this->pdo->prepare("SELECT * FROM user_tbl WHERE username = :username LIMIT 1");

            $stmt->execute([
                ':username' => $username
            ]);
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (empty($result)) {
                echo 'username not found';
                exit;
            }
            
            $hashpasswd = $result['passwd'];

            if (password_verify($passwd, $hashpasswd)) {
                echo 'Log in Successfully';
                header('location: /dashboard.php');
            } else {
                echo 'Wron';
            }

        } catch (PDOExeption $e) {
            echo "username already exist";
        }

    }

}

$manager = new SubmitUser($pdo);

$manager->insertUser();

?>

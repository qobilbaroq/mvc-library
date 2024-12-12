<?php

require_once 'config/database.php';


class User
{
    private $id, $name, $username, $password, $role_id;

    // public function __construct( $name, $username, $password, $role_id){
    //     $this->name = $name;
    //     $this->username = $username;
    //     $this->password = $password;
    //     $this->role_id = $role_id;

    // }

    private function getUsename()
    {
        return $this->username;
    }



    public function auth($username, $password)
    {
        try {
            global $pdo;
            $select = "SELECT * FROM users WHERE username='" . $username . "'";

            $query = $pdo->query($select);
            $user = $query->fetchALL(PDO::FETCH_CLASS, "user");

            if (count($user) == 0) {
                $_SESSION['error'] = "user acan regis ey";
                header('location: /login');
                die;
            }

            if (password_verify($password, $user[0]->password)) {
                $_SESSION['is_login'] = true;
                $_SESSION['username'] = $this->username;
                header("Location: /membership");
                die();
            }

            $_SESSION['error'] = "salah password nya brow";
            header('location: /membership');
        } catch (PDOException $e) {
            echo $user . "<br>" . $e->getMessage();
        }
    }


    public function register()
{
    try {
        global $pdo;

        // Debugging: cek data dari form
        // var_dump($_POST);
        // exit;

        // Validasi data
        if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password'])) {
            throw new Exception("All fields are required");
        }

        // Bind data ke properti class
        $this->name = $_POST['name'];
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];

        // Query dengan prepared statements
        $query = "INSERT INTO users (name, username, password, role_id) VALUES (:name, :username, :password, :role_id)";
        $stmt = $pdo->prepare($query);

        // Hash password dan bind parameter
        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindValue(':role_id', 2, PDO::PARAM_INT);

        // Eksekusi query
        $stmt->execute();

        // Sukses
        $_SESSION['success'] = "Register success";
        header('Location: /register');
        exit;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

}

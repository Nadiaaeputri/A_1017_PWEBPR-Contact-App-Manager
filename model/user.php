<?php
include_once __DIR__ . '/../app/config/dbconn.php';

class User
{
    static function login($data = [])
    {
        global $conn;
    
        $username = $data['username'];
        $password = $data['password'];
    
        $stmt = $conn->prepare("SELECT * FROM data_akun WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $hashedPassword = $user['password'];
            if (password_verify($password, $hashedPassword)) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    
    static function register($data = [])
    {
        global $conn;

        $nama = $data['longname'];
        $umur = $data['age'];
        $username = $data['username'];
        $password = $data['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO data_akun (nama, umur, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('sssss', $nama, $umur, $username, $hashedPassword);
        $result = $stmt->execute();

        return $result;
    }

    static function getPassword($username)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT password FROM data_akun WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $password = $result->fetch_assoc()['password'];
            return $password;
        } else {
            return false;
        }
    }
}

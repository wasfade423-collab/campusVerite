<?php
class UserModel
{
    public static function create($email, $password, $role = 'etudiant')
    {
        $db = Database::connect();
        //  password_hash($password, PASSWORD_DEFAULT);
        $hash = $password;
        $stmt = $db->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
        return $stmt->execute([$email, $hash, $role]);
    }

    public static function findByEmail($email)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}

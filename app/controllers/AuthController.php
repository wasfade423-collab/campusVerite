<?php
class AuthController
{
    public function register()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password)) {
            UserModel::create($email, $password);
            header('Location: index.php?action=login&success=1');
        } else {
            header('Location: index.php?action=register&error=empty');
        }
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = UserModel::findByEmail($email);
        //  && password_verify($password, $user['password'])
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header('Location: index.php?action=admin-dashboard');
            } else {
                header('Location: index.php?action=feedbacks');
            }
        } else {
            header('Location: index.php?action=login&error=invalid');
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php?action=home');
    }
}

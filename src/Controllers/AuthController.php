<?php

namespace App\Controllers;

class AuthController
{

    protected $model;

    public function __construct()
    {
        $this->model = new \App\Models\AuthModel();
    }

    public function SignIn()
    {
        $username = $this->RealString($_POST['username']);
        $password = $this->RealString($_POST['password']);
        $captcha = $this->RealString($_POST['captcha']);
        $res = $this->model->FindUser($username);

        if ($captcha === $_SESSION['captcha']) {
            if ($res != null) {
                return $this->MakeDecrypt($password, $res['password']) ? $this->IsLogged($res['level']) : $this->IsMissing();
            } else return $this->IsMissing();
        } else return $this->IsMissing();
    }

    public function IsLogged($level)
    {
        $_SESSION['auth'] = date('YmdHis');
        $_SESSION['level'] = $level;
        header('Location: /admin');
        exit();
    }

    public function IsMissing()
    {
        header('location: /login');
        exit();
    }

    public function Authenticated()
    {
        if (isset($_SESSION['auth'])) {
            header('Location: /admin');
            exit();
        }
    }

    public function CheckAuth()
    {
        if (!isset($_SESSION['auth'])) {
            header('Location: /login');
            exit();
        }
    }

    public function Logout()
    {
        session_destroy();
        header('location: /login');
    }

    public function MakeDecrypt($pass, $hashedPassword)
    {
        if (password_verify($pass, $hashedPassword)) {
            return true;
        } else {
            return false;
        }
    }

    public function MakeEncrypt($string)
    {
        $mypw = password_hash($string, PASSWORD_BCRYPT, ['cost' => 12]);
        return $mypw;
    }

    private function RealString($input)
    {
        return preg_replace('/[^a-zA-Z0-9]/', '', $input);
    }
}

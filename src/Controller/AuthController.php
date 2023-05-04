<?php

namespace App\Controller;

use App\Model\UserModel;

class AuthController
{
    public function register($email, $first_name, $last_name, $password)
    {
        $userModel = new UserModel;

        if ($email && $first_name && $last_name && $password) {

            $email = htmlspecialchars(trim($email));
            $first_name = htmlspecialchars(trim($first_name));
            $last_name = htmlspecialchars(trim($last_name));
            $password = htmlspecialchars(trim($password));

            $exist = $userModel->findUser(['email' => $email]);

            if (!$exist) {
                $userModel->insertDB([$email, $first_name, $last_name, password_hash($password, PASSWORD_DEFAULT)]);
            } else {
                echo "Already exist";
            }
        } else {
            echo "ERREUR";
        }
    }
}

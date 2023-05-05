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

    public function login($email, $password)
    {
        $userModel = new UserModel;

        $email = htmlspecialchars(trim($email));
        $password = htmlspecialchars(trim($password));

        if ($email && $password) {

            $users = $userModel->tableUser();
            //var_dump($users);

            foreach ($users as $user) {
                //var_dump($user);
                if ($email === $user['email'] && $password === $user['password']) {
                    echo "oui";
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    header("location: /");
                } else {
                    echo 'non';
                }
            }
        }
    }
}

<?php

namespace App\Controller;

use App\Model\UserModel;

class UserController
{

    public function fillDB()
    {

        $userModel = new UserModel();

        $array = [
            ['email' => 'paul@logo.fr', 'first' => 'Paul', 'last' => 'Logo', 'password' => 'user'],
            ['email' => 'marc@coco.com', 'first' => 'Marc', 'last' => 'Coco', 'password' => 'user'],
            ['email' => 'sandy@dob.com', 'first' => 'Sandy', 'last' => 'Dob', 'password' => 'user'],
            ['email' => 'adri@merc.fr', 'first' => 'Adri', 'last' => 'Merc', 'password' => 'user'],
            ['email' => 'anny@marsy.fr', 'first' => 'Anny', 'last' => 'Marsy', 'password' => 'user']
        ];

        foreach ($array as $user) {
            $userModel->insertDB([$user['email'], $user['first'], $user['last'], password_hash($user['password'], PASSWORD_DEFAULT)]);
        }
    }
}
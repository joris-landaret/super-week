<?php

namespace App\Model;

use PDO;

class UserModel
{

    public function insertDB($values)
    {

        $db = new PDO('mysql:host=localhost;dbname=super-week;charset=utf8;port=3307', 'root', '');

        $sql = "INSERT INTO `user` (`email`,`first_name`,`last_name`,`password`) 
        VALUE (?,?,?,?)";
        $request = $db->prepare($sql);
        $request->execute($values);
    }
}
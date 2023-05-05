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

    public function findAll()
    {
        $db = new PDO('mysql:host=localhost;dbname=super-week;charset=utf8;port=3307', 'root', '');

        $sql = "SELECT * FROM user";
        $request = $db->prepare($sql);
        $request->execute();
        $list = $request->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    public function findUser(array $array)
    {
        $db = new PDO('mysql:host=localhost;dbname=super-week;charset=utf8;port=3307', 'root', '');
        $sql = 'SELECT * FROM user WHERE ';
        foreach ($array as $key => $value) {
            $sql .= "$key = :$key";
        }
        $request = $db->prepare($sql);
        $request->execute($array);

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tableUser()
    {
        $db = new PDO('mysql:host=localhost;dbname=super-week;charset=utf8;port=3307', 'root', '');
        $sql = 'SELECT * FROM user';

        $request = $db->prepare($sql);
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
}

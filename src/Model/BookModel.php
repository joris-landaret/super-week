<?php

namespace App\Model;

use PDO;

class BookModel
{

    public function insertDB($values)
    {

        $db = new PDO('mysql:host=localhost;dbname=super-week;charset=utf8;port=3307', 'root', '');

        $sql = "INSERT INTO `book` (`title`,`content`,`id_user`) 
        VALUE (?,?,?)";
        $request2 = $db->prepare($sql);
        $request2->execute($values);
    }

    public function findAll()
    {
        $db = new PDO('mysql:host=localhost;dbname=super-week;charset=utf8;port=3307', 'root', '');

        $sql = "SELECT * FROM book";
        $request = $db->prepare($sql);
        $request->execute();
        $list = $request->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    public function findBook(array $array)
    {
        $db = new PDO('mysql:host=localhost;dbname=super-week;charset=utf8;port=3307', 'root', '');
        $sql = 'SELECT * FROM book WHERE ';
        foreach ($array as $key => $value) {
            $sql .= "$key = :$key";
        }
        $request = $db->prepare($sql);
        $request->execute($array);

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
}

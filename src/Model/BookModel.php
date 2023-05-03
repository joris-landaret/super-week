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
}

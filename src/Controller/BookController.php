<?php

namespace App\Controller;

use App\Model\BookModel;

class BookController
{

    public function fillDB()
    {

        $bookModel = new BookModel();

        $array2 = [
            ['title' => 'Ronron', 'content' => 'Ronflex', 'id_user' => 2],
            ['title' => 'Coco', 'content' => 'Musique', 'id_user' => 4],
            ['title' => 'Dodo', 'content' => 'Berceuse', 'id_user' => 1],
            ['title' => 'Toto', 'content' => 'blague', 'id_user' => 5],
            ['title' => 'Cheval', 'content' => 'Animal', 'id_user' => 3],
            ['title' => 'Lampe', 'content' => 'Lumière', 'id_user' => 4]
        ];

        foreach ($array2 as $book) {
            $bookModel->insertDB($book['title'], $book['content'], $book['id_user']);
        }
    }
}

<?php

include $_SERVER['DOCUMENT_ROOT'] . '/class/Controller.php';
include $_SERVER['DOCUMENT_ROOT'] . '/models/BookRepository.php';

class BookController extends Controller
{

    public function index()
    {

        $book = new BookRepository();

        $this->render('book/index', $book->getListBook());
    }


}

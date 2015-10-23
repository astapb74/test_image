<?php

include $_SERVER['DOCUMENT_ROOT'] . '/class/Controller.php';
include $_SERVER['DOCUMENT_ROOT'] . '/draw/DrawImageDirector.php';
include $_SERVER['DOCUMENT_ROOT'] . '/models/FileRepository.php';

class RunController extends Controller
{

    public function index()
    {
        $draw = new \draw\DrawImageDirector(new draw\DrawImageBuilder());
        $data = $draw->getImageList();
        $this->render('index', $data);
    }

    public function view()
    {

        if (!empty($_POST)) {
            $draw = new \draw\DrawImageBuilder();
            $draw->buildImage($_POST);
        }

        $this->render('view');
    }

    public function type()
    {
        $files = new FileRepository();
        $this->render('type', $files->getEmptyTypeFiles());
    }

}

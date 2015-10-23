<?php

namespace draw {

    use Common\Repository;

    require_once $_SERVER['DOCUMENT_ROOT'] . '/class/AbstractRepository.php';

    abstract class AbstractImageBuilder
    {
        abstract function getImageList();
    }

    abstract class AbstractImageDirector
    {
        abstract function __construct(AbstractImageBuilder $builder_in);

        abstract function buildImage();

        abstract function getImageList();
    }

    class DrawImage
    {

        private $image = NULL;

        public function __construct()
        {
            $this->image = new \Imagick();
            $this->image->newImage(150, 120, 'white');
            $this->image->setImageFormat('jpeg');
        }

        public function drawCircle($param = [])
        {
            $draw = new \ImagickDraw();

            $strokeColor = new \ImagickPixel($param['lineColor']);
            $fillColor = new \ImagickPixel('white');

            $draw->setStrokeOpacity(1);
            $draw->setStrokeColor($strokeColor);
            $draw->setFillColor($fillColor);

            $draw->setStrokeWidth($param['lineSize']);

            $R = (int)$param['x2'] / 2;

            $param['x1'] -= (int)$R / 2;
            $param['y1'] -= (int)$R / 2;
            $param['x2'] = $param['x1'] + $R;
            $param['y2'] = $param['y1'] + $R;

            $draw->circle($param['x1'], $param['y1'], $param['x2'], $param['y2']);
            $this->image->drawImage($draw);

        }

        public function drawRectangle($param = [])
        {
            $draw = new \ImagickDraw();
            $strokeColor = new \ImagickPixel($param['lineColor']);
            $fillColor = new \ImagickPixel('white');

            $draw->setStrokeColor($strokeColor);
            $draw->setFillColor($fillColor);
            $draw->setStrokeOpacity(1);
            $draw->setStrokeWidth($param['lineSize']);

            $draw->rectangle($param['x1'], $param['y1'], $param['x2'], $param['y2']);
            $this->image->drawImage($draw);
        }

        public function save()
        {
            $path = '/img/i' . uniqid() . '.jpg';
            if (file_put_contents ($_SERVER['DOCUMENT_ROOT'] . $path, $this->image))
            {
                $repo = new \Common\Repository;
                $sql = "INSERT INTO file(path) VALUES ('$path');";
                $repo->query($sql);
            }
        }
    }

    class DrawImageBuilder extends AbstractImageBuilder
    {
        private $image = NULL;

        function __construct()
        {
            $this->image = new DrawImage();
        }

        function buildImage($data = [])
        {
            foreach ($data as $items) {
                $this->image->{'draw' . ucfirst($items['type'])}($items['param']);
            }
            $this->image->save();
        }

        function getImageList()
        {
            return $this->image;
        }
    }

    class DrawImageDirector extends AbstractImageDirector
    {
        private $builder = NULL;

        public function __construct(AbstractImageBuilder $builder_in)
        {
            $this->builder = $builder_in;
        }

        function buildImage($data = [])
        {
            //$this->builder->buildImage($data);
        }

        public function getImageList()
        {
            $repo = new Repository();
            $sql = "SELECT * FROM file";
            return $repo->getMany($sql);
        }
    }
}

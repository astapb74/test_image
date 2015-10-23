<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/class/AbstractRepository.php';

class FileRepository extends \Common\Repository
{

    public function getEmptyTypeFiles()
    {
        $sql = "SELECT
                  *
                FROM `type_file` tf
                  LEFT JOIN file f ON (f.type_id = tf.id)
				WHERE isnull(f.type_id);";

        return $this->getMany($sql);

    }
}
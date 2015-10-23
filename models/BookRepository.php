<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/class/AbstractRepository.php';

class BookRepository extends \Common\Repository
{

    public function getListBook()
    {
        $sql = "SELECT
                  ae.article_id,
                  ae.title article_title,
                  ae.text article_text,
                  ae.created article_created,
                  LTRIM(GROUP_CONCAT(DISTINCT ' ', a.name)) article_author
                FROM Book ae
                  LEFT JOIN AuthorBook aa USING(article_id)
                  LEFT JOIN Author a USING(author_id)
                GROUP BY ae.article_id
                ORDER BY created DESC";

        return $this->getMany($sql);

    }
}
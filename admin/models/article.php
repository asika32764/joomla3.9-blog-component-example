<?php

use Joomla\CMS\MVC\Model\BaseDatabaseModel;

defined('_JEXEC') or die;

class BlogModelArticle extends BaseDatabaseModel
{
    public function save($data)
    {
        $db = $this->_db;

        // 把 $data 內的每個元素用單引號包起來，並且跳脫不合法字元
        foreach ($data as &$value)
        {
            $value = $db->quote($value);
        }

        $sql = "INSERT INTO #__blog_articles"
            . " (title, alias, created, introtext, `fulltext`) "
            . " VALUES (" . implode(', ', $data) . ")";

        $db->setQuery($sql);

        return $db->execute();
    }
}

<?php

use Joomla\CMS\MVC\Model\BaseDatabaseModel;

defined('_JEXEC') or die;

class BlogModelArticles extends BaseDatabaseModel
{
    public function getItems()
    {
        $db = $this->_db;

        $query = $db->getQuery(true);

        $query->select('*')
            ->from('#__blog_articles')
            ->order('id ASC');

        $db->setQuery($query);

        // If not thing found, return empty array.
        return $db->loadObjectList() ? : array();
    }
}

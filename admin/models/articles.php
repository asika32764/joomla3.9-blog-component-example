<?php

use Joomla\CMS\MVC\Model\BaseDatabaseModel;

defined('_JEXEC') or die;

class BlogModelArticles extends BaseDatabaseModel
{
    public function getItems()
    {
        $db = JFactory::getDbo();

        // Or using $db = $this->_db;

        $sql = "SELECT * FROM #__blog_articles";

        $db->setQuery($sql);

        // If not thing found, return empty array.
        return $db->loadObjectList() ? : array();
    }
}

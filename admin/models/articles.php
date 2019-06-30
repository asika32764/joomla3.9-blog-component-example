<?php

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;

defined('_JEXEC') or die;

class BlogModelArticles extends BaseDatabaseModel
{
    protected function populateState()
    {
        $app = Factory::getApplication();

        // 我們把 filter_search 從 request 中拿出來，暫存在 filter.search 的 state 中
        $this->setState(
            'filter.search',
            $app->getUserStateFromRequest('blog.articles.search', 'filter_search')
        );
    }

    public function getItems()
    {
        $db = $this->_db;

        $query = $db->getQuery(true);

        // 接下來從 state 中把 search 內容拿出來
        $search = $this->getState('filter.search');

        // 如果有的話，就加上 LIKE 的 SQL 來做搜尋
        if ($search)
        {
            $conditions = '(`title` LIKE "%' . $search . '%"';
            $conditions .= ' OR `introtext` LIKE "%' . $search . '%"';
            $conditions .= ' OR `fulltext` LIKE "%' . $search . '%")';

            $query->where($conditions);
        }

        $query->select('*')
            ->from('#__blog_articles')
            ->order('id ASC');

        $db->setQuery($query);

        $db->setQuery($query);

        // If not thing found, return empty array.
        return $db->loadObjectList() ? : array();
    }
}

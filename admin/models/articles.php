<?php

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;

defined('_JEXEC') or die;

class BlogModelArticles extends BaseDatabaseModel
{
    protected function populateState()
    {
        $app = Factory::getApplication();

        $this->setState('filter.published', $app->getUserStateFromRequest('blog.articles.published', 'filter_published'));
        $this->setState(
            'filter.search',
            $app->getUserStateFromRequest('blog.articles.search', 'filter_search')
        );

        $this->setState('list.ordering', $app->getUserStateFromRequest('blog.articles.ordering', 'filter_order'));
        $this->setState('list.direction', $app->getUserStateFromRequest('blog.articles.direction', 'filter_order_Dir'));
    }

    public function getItems()
    {
        $db = $this->_db;

        $query = $db->getQuery(true);

        // 把 order 用的 state 拿出來（第二個參數是不存在時的預設值）
        $ordering   = $this->getState('list.ordering', 'id');
        $direction = $this->getState('list.direction', 'asc');
        $published = $this->getState('filter.published', '');

        if ($published !== '')
        {
            $query->where('published = ' . $query->quote($published));
        }

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
            // 這裡放上抓進來的 order
            ->order($ordering . ' ' . $direction);

        $db->setQuery($query);

        // If not thing found, return empty array.
        return $db->loadObjectList() ? : array();
    }
}

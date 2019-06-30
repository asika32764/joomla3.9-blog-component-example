<?php

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;
use Joomla\CMS\Pagination\Pagination;

defined('_JEXEC') or die;

class BlogModelArticles extends BaseDatabaseModel
{
    protected function populateState()
    {
        $app = Factory::getApplication();

        // Search & Filter
        $this->setState('filter.published', $app->getUserStateFromRequest('blog.articles.published', 'filter_published'));
        $this->setState(
            'filter.search',
            $app->getUserStateFromRequest('blog.articles.search', 'filter_search')
        );

        // Ordering
        $this->setState('list.ordering', $app->getUserStateFromRequest('blog.articles.ordering', 'filter_order'));
        $this->setState('list.direction', $app->getUserStateFromRequest('blog.articles.direction', 'filter_order_Dir'));

        // Limit / Start
        $this->setState('list.limit', 5);
        $this->setState('list.start', $app->getUserStateFromRequest('blog.articles.start', 'limitstart'));
    }

    public function getItems()
    {
        $db = $this->_db;

        $query = $db->getQuery(true);

        $limit = (int) $this->getState('list.limit', 5);
        $start = (int) $this->getState('list.start', 0);

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

        $db->setQuery($query, $start, $limit);

        // If not thing found, return empty array.
        return $db->loadObjectList() ? : array();
    }

    public function getPagination()
    {
        // 不加 true 拿回原本的 query
        $query = $this->_db->getQuery();

        // 更改 select 成 COUNT(*)
        $query->clear('select')
            ->clear('limit')
            ->select('COUNT(*)');

        // 進行第二次查詢，拿出 total 值
        $total = $this->_db->setQuery($query)->loadResult();
        $limit = (int) $this->getState('list.limit', 5);
        $start = (int) $this->getState('list.start', 0);

        return new Pagination($total, $start, $limit);
    }
}

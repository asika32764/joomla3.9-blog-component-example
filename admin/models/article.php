<?php

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;

defined('_JEXEC') or die;

class BlogModelArticle extends BaseDatabaseModel
{
    public function getItem()
    {
        $input = Factory::getApplication()->input;

        $id = $input->get('id');

        if (!$id)
        {
            return false;
        }

        $sql = "SELECT * FROM #__blog_articles WHERE id = " . $id;

        return $this->_db->setQuery($sql)->loadObject();
    }

    public function save($data)
    {
        $db = $this->_db;

        $id = $data['id'];

        $data = (object) $data;

        // 有 id 時用 update
        if ($id)
        {
            $db->updateObject('#__blog_articles', $data, 'id');
        }

        // 沒有 id 時用 insert
        else
        {
            $db->insertObject('#__blog_articles', $data);
        }

        return true;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM #__blog_articles WHERE id = " . (int) $id;

        return $this->_db->setQuery($sql)->execute();
    }
}

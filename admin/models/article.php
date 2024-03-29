<?php

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;

defined('_JEXEC') or die;

class BlogModelArticle extends BaseDatabaseModel
{
    public function getTable($name = 'Article', $prefix = 'BlogTable', $options = array())
    {
        return parent::getTable($name, $prefix, $options);
    }
    
    public function getItem()
    {
        $table = $this->getTable();

        $input = JFactory::getApplication()->input;

        $id = $input->get('id');

        if (!$id)
        {
            return false;
        }

        $table->load($id);

        return $table;
    }

    public function save($data)
    {
        $table = $this->getTable();

        $table->bind($data);

        return $table->store();
    }

    public function delete($id)
    {
        $table = $this->getTable();

        return $table->delete($id);
    }
}

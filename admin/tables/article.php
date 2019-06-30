<?php

use Joomla\CMS\Table\Table;

defined('_JEXEC') or die;

class BlogTableArticle extends Table
{
    public function __construct($db)
    {
        parent::__construct('#__blog_articles', 'id', $db);
    }
}

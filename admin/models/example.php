<?php

use Joomla\CMS\Date\Date;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;

defined('_JEXEC') or die;

class BlogModelExample extends BaseDatabaseModel
{
    public function getItem()
    {
        $item = new stdClass;

        $item->title = 'Example View & Template';
        $item->content = 'Go go let\'s go~~~!!!!';
        $item->date = new Date('now', 'Asia/Taipei');

        return $item;
    }
}

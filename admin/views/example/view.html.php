<?php

use Joomla\CMS\Date\Date;
use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class BlogViewExample extends HtmlView
{
    public function display($tpl = null)
    {
        $this->title = 'Example View & Template';
        $this->content = 'Go go let\'s go~~~!!!!';
        $this->date = new Date('now', 'Asia/Taipei');

        parent::display($tpl);
    }
}

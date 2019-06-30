<?php

use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class BlogViewArticles extends HtmlView
{
    public function display($tpl = null)
    {
        $this->items = $this->get('Items');

        parent::display($tpl);
    }
}

<?php

use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class BlogViewArticle extends HtmlView
{
    public function display($tpl = null)
    {
        $this->addToolbar();

        parent::display($tpl);
    }

    public function addToolbar()
    {
        JToolbarHelper::title('Article Edit', 'pencil');

        JToolbarHelper::save('save');
    }
}

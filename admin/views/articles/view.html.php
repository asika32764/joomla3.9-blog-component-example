<?php

use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

defined('_JEXEC') or die;

class BlogViewArticles extends HtmlView
{
    public function display($tpl = null)
    {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        $this->addToolbar();

        parent::display($tpl);
    }

    public function addToolbar()
    {
        ToolbarHelper::title('Articles');

        ToolbarHelper::addNew('article.add');
    }
}

<?php

use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class BlogViewExample extends HtmlView
{
    public function display($tpl = null)
    {
        $this->item = $this->get('Item');

        if(!$this->item)
        {
            throw new \Exception('No item.');
        }

        $this->item->date = $this->item->date->format('Y-m-d', true);

        parent::display($tpl);
    }
}

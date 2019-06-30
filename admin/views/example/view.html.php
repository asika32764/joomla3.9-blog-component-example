<?php

use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class BlogViewExample extends HtmlView
{
    public function display($tpl = null)
    {
        echo 'Example View Display.';
    }
}

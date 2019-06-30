<?php

use Joomla\CMS\MVC\Controller\BaseController;

defined('_JEXEC') or die;

class BlogController extends BaseController
{
    public function display($cachable = false, $urlparams = array())
    {
        $view = $this->getView('Example', 'html');

        $view->display();
    }

    public function flower()
    {
        echo 'Flower';
    }
}

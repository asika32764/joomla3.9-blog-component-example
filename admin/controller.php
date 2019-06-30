<?php

use Joomla\CMS\MVC\Controller\BaseController;

defined('_JEXEC') or die;

class BlogController extends BaseController
{
    public function display($cachable = false, $urlparams = array())
    {
        // Get model & view
        $model = $this->getModel('Example');
        $view = $this->getView('Example', 'html');

        // Push model into view
        $view->setModel($model, true);

        $view->display();
    }

    public function flower()
    {
        echo 'Flower';
    }
}

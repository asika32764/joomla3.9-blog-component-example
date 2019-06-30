<?php

use Joomla\CMS\MVC\Controller\BaseController;

defined('_JEXEC') or die;

class BlogController extends BaseController
{
    public function display($cachable = false, $urlparams = array())
    {
        echo 'Display Task';
    }

    public function flower()
    {
        echo 'Flower';
    }
}

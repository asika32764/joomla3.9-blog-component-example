<?php

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Router\Route;

defined('_JEXEC') or die;

class BlogController extends BaseController
{
    protected $default_view = 'articles';

    public function display($cachable = false, $urlparams = array())
    {
        $view = $this->input->get('view', $this->default_view);
        $layout = $this->input->get('layout', 'default');

        // Get model & view
        $model = $this->getModel($view);
        $view = $this->getView($view, 'html');

        // Push model into view
        $view->setModel($model, true);

        $view->setLayout($layout);

        $view->display();
    }

    public function add()
    {
        $this->setRedirect(Route::_('index.php?option=com_blog&view=article&layout=edit', false));
    }
}

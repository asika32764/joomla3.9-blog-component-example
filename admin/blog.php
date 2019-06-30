<?php

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;

// Get request input object
$input = Factory::getApplication()->input;

// Execute the task.
$controller = BaseController::getInstance('Blog');
$controller->execute($input->get('task'));
$controller->redirect();

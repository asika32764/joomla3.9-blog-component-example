<?php

use Joomla\CMS\Factory;

// Get request input object
$input = Factory::getApplication()->input;

// Execute the task.
$controller = JControllerLegacy::getInstance('Blog');
$controller->execute($input->get('task'));
$controller->redirect();

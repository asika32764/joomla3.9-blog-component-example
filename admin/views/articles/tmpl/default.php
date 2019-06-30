<?php

use Joomla\String\StringHelper;

defined('_JEXEC') or die;
?>
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Intro</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->items as $item): ?>
        <tr>
            <td><?php echo $item->id; ?></td>
            <td><?php echo $this->escape($item->title); ?></td>
            <td><?php echo StringHelper::substr(strip_tags($item->introtext), 0, 50); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

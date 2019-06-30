<?php
defined('_JEXEC') or die;
?>
<form action="<?php echo JUri::getInstance(); ?>" id="adminForm" name="adminForm" method="post">
    <fieldset class="form-horizontal">
        <legend>Blog Info</legend>

        <!-- Title -->
        <div class="control-group">
            <label for="form-title" class="control-label">Title</label>
            <div class="controls">
                <input type="text" id="form-title" name="title" value="" />
            </div>
        </div>

        <!-- Alias -->
        <div class="control-group">
            <label for="form-alias" class="control-label">Alias</label>
            <div class="controls">
                <input type="text" id="form-alias" name="alias" value="" />
            </div>
        </div>

        <!-- Created -->
        <div class="control-group">
            <label for="form-created" class="control-label">Created Time</label>
            <div class="controls">
                <?php echo JHtml::calendar('now', 'created', 'form-created'); ?>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Text</legend>

        <!-- Intro text -->
        <div class="control-group row-fluid">
            <label for="form-title" class="control-label">Intro Text</label>
            <div class="controls span6">
                <?php echo $this->introEditor; ?>
            </div>
        </div>

        <hr />

        <!-- Full text -->
        <div class="control-group row-fluid">
            <label for="form-alias" class="control-label">Full text</label>
            <div class="controls span6">
                <?php echo $this->fullEditor; ?>
            </div>
        </div>
    </fieldset>

    <div class="hidden-inputs">
        <input type="hidden" name="option" value="com_blog" />
        <input type="hidden" name="task" value="" />
    </div>
</form>

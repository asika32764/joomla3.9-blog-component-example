<?php

use Joomla\CMS\Editor\Editor;
use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class BlogViewArticle extends HtmlView
{
    public function display($tpl = null)
    {
        // 取得全站設定中的編輯器設定檔
        $config = JFactory::getConfig();

        // 呼叫編輯器物件，直接 render 出來
        $this->introEditor = Editor::getInstance($config->get('editor'))->display('introtext', '', '600px', '300px', 50, 15);
        $this->fullEditor = Editor::getInstance($config->get('editor'))->display('fulltext', '', '600px', '300px', 50, 15);

        $this->addToolbar();

        parent::display($tpl);
    }

    public function addToolbar()
    {
        JToolbarHelper::title('Article Edit', 'pencil');

        JToolbarHelper::save('article.save');
    }
}

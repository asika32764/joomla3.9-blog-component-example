<?php

use Joomla\CMS\Editor\Editor;
use Joomla\CMS\Factory;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

defined('_JEXEC') or die;

class BlogViewArticle extends HtmlView
{
    public function display($tpl = null)
    {
        // 跟 Model 要資料
        $this->item = $this->get('Item');

        // 包裝進 JData 方便取資料
        $this->item = new JData($this->item);

        // 取得全站設定中的編輯器設定檔
        $config = Factory::getConfig();

        // 呼叫編輯器物件，直接 render 出來
        $this->introEditor = Editor::getInstance($config->get('editor'))->display('introtext', $this->item->introtext, '600px', '300px', 50, 15);
        $this->fullEditor = Editor::getInstance($config->get('editor'))->display('fulltext', $this->item->fulltext, '600px', '300px', 50, 15);

        $this->addToolbar();

        parent::display($tpl);
    }

    public function addToolbar()
    {
        ToolbarHelper::title('Article Edit', 'pencil');

        ToolbarHelper::save('article.save');
        ToolbarHelper::cancel('article.cancel');
    }
}

<?php

namespace Idea10\Knowledge\Base\Handler;

use Bitrix\Main\Localization\Loc;

class CrmMenu
{
    public static function addKnowledgeBaseMenu(&$items)
    {
        $items[] = array(
            'ID' => 'idea10.knowledge.base',
            'MENU_ID' => 'menu_crm_knowledge_base',
            'NAME' => 'База знаний',
            'TITLE' => 'База знаний',
            'URL' => '/crm/knowledge_base/list/'
        );
    }
}
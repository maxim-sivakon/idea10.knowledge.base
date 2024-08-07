<?php
defined('B_PROLOG_INCLUDED') || die;

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;


class CIdea10KnowledgeBaseMainBookListComponent extends CBitrixComponent
{

    public function executeComponent()
    {
        $this->includeComponentTemplate('index');
    }
}

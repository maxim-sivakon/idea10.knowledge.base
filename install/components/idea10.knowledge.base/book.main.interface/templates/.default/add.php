<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$APPLICATION->SetTitle('База знаний');
/** @var $this CBitrixComponentTemplate */
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */

/** @var string $componentPath */

use Bitrix\Main;
use Bitrix\UI;
use Bitrix\Main\{Application, Localization\Loc};

$APPLICATION->IncludeComponent(
    'idea10.knowledge.base:book.main.book.add', '', [], false
);

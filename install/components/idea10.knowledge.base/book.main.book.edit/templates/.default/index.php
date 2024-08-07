<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

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
use Bitrix\Main\{Application, Localization\Loc};
?>

<div class="book-documents-control-panel-wrapper">
    <div class="book-documents-control-panel-sections">Доступные книги</div>
    <div class="book-documents-control-panel-sections-desc">Доступный список книг для сотрудников, выберите любую из
        книг для осваивания материала.
    </div>
    <div class="book-hr"></div>

    <div class="book-documents-control-panel">

        <a href="###" class="book-documents-control-panel-card-box">
            <div class="book-documents-control-panel-card">
                <img class="book-documents-control-panel-card-image"
                     src="<?= $templateFolder ?>/images/no-image.png"
                     alt="Регламент (new)">
                <div class="book-documents-control-panel-card-name">Регламент (new)</div>
            </div>
        </a>

    </div>
</div>

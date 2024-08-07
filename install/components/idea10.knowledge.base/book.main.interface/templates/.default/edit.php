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
use Bitrix\UI;
use Bitrix\Main\{Application, Localization\Loc};
use Bitrix\UI\{Buttons\Color, Buttons\Icon, Buttons\Tag, Toolbar\Facade\Toolbar};

\Bitrix\Main\UI\Extension::load([
    'ui.design-tokens',
    'ui.fonts.opensans',
    'ui.icons.b24',
]);

$APPLICATION->SetPageProperty('BodyClass', $APPLICATION->GetPageProperty('BodyClass').'book-hr-top no-background');

Toolbar::addFilter([
    'GRID_ID'               => 'GRID_ID',
    'FILTER_ID'             => 'FILTER_ID',
    'FILTER'                => 'FILTER',
    'FILTER_PRESETS'        => 'FILTER_PRESETS',
    'ENABLE_LIVE_SEARCH'    => true,
    'ENABLE_LABEL'          => true,
    'RESET_TO_DEFAULT_MODE' => false,
]);
Toolbar::setTitleMinWidth(158);

$arResult[ 'DOCUMENT_HANDLERS' ] = [
    [
        'code' => 'new-book',
        'name' => 'Новую книгу'
    ],
    [
        'code' => 'section-book',
        'name' => 'Раздел книги'
    ],
    [
        'code' => 'page-section-book',
        'name' => 'Страница раздела книги'
    ],
    [
        'code' => 'test-book',
        'name' => 'Тест для книги'
    ],
    [
        'code' => 'test-section-book',
        'name' => 'Тест для раздела книги'
    ],
    [
        'code' => 'test-page-section-book',
        'name' => 'Тест для страницы'
    ],
];

$defaultHandler = end($arResult[ 'DOCUMENT_HANDLERS' ]);
$items = array_map(function ($item) use ($defaultHandler) {
    return [
        'text' => $item[ 'name' ],
        'code' => $item[ 'code' ]
    ];
}, $arResult[ 'DOCUMENT_HANDLERS' ]);

$createButton = UI\Buttons\CreateButton::create([
    'dataset' => [
        'toolbar-collapsed-icon' => UI\Buttons\Icon::ADD
    ]
]);
$createButton
    ->setText('Создать')
    ->setColor(UI\Buttons\Color::SUCCESS)
    ->setMenu([
        'items' => $items
    ]);
Toolbar::addButton($createButton, UI\Toolbar\ButtonLocation::AFTER_TITLE);

$settings = Toolbar::addButton([
    'color'    => UI\Buttons\Color::LIGHT_BORDER,
    'icon'     => UI\Buttons\Icon::SETTING,
    'dropdown' => false,
    'text'     => 'Настройки',
    'menu'     => [
        'items' => [
            [
                'text'    => 'text',
                'onclick' => new UI\Buttons\JsHandler('BX.Disk.InformationPopups.openWindowForSelectDocumentService')
            ]
        ]
    ]
]);

Toolbar::addButton([
    "color"     => Color::LIGHT_BORDER,
    "tag"       => Tag::LINK,
    "className" => 'js-disk-trashcan-button',
    "dataset"   => ['toolbar-collapsed-icon' => Icon::REMOVE],
    "link"      => $arResult[ 'PATH_TO_TRASHCAN_LIST' ],
    "text"      => 'Избранные',
]);

// для определения темы
//use Bitrix\Intranet\Integration\Templates\Bitrix24;
//$themePicker = Bitrix24\ThemePicker::getInstance();
//$theme = explode(":", $themePicker->getCurrentThemeId())[0];

$APPLICATION->IncludeComponent(
    'idea10.knowledge.base:book.main.book.list',
    '',
    array(
    ),
    false
);

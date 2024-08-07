<?php
defined('B_PROLOG_INCLUDED') || die;

use Bitrix\Main\{Loader, Localization\Loc};

global $APPLICATION, $USER;

if (!$USER->IsAdmin()) {
    return;
}

$module_id = 'idea10.knowledge.base';
Loader::includeModule($module_id);

$tabs = [
    [
        'DIV'   => 'general',
        'TAB'   => 'Общие настройки',
        'TITLE' => 'Настройки модуля «Базы знаний»'
    ]
];

$options = [
    'general' => [
        'BOOK_DETAIL_TEMPLATE', 'Шаблон URL карточки книги', '', ['text', '50'],
        'BOOK_DETAIL_SECTION_TEMPLATE', 'Шаблон URL карточки раздела книги', '', ['text', '50'],
        'BOOK_DETAIL_PAGE_TEMPLATE', 'Шаблон URL карточки страницы книги', '', ['text', '50'],
    ]
];

if (check_bitrix_sessid() && strlen($_POST[ 'save' ]) > 0) {
    foreach ($options as $option) {
        __AdmSettingsSaveOptions($module_id, $option);
    }
    LocalRedirect($APPLICATION->GetCurPageParam());
}
$tabControl = new CAdminTabControl('tabControl', $tabs);
$tabControl->Begin();
?>
<form method="POST"
      action="<?php echo $APPLICATION->GetCurPage() ?>?lang=<?= LANGUAGE_ID ?>">
    <?php $tabControl->BeginNextTab(); ?>
    <?php __AdmSettingsDrawList($module_id, $options[ 'general' ]); ?>
    <?php $tabControl->Buttons(['btnApply' => false, 'btnCancel' => false, 'btnSaveAndAdd' => false]); ?>
    <?= bitrix_sessid_post(); ?>
    <?php $tabControl->End(); ?>
</form>

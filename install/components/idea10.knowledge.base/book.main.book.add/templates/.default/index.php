<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->SetTitle('Новая книга');
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
\Bitrix\Main\UI\Extension::load("ui.forms");
?>
<form method="POST"
      action="<?php echo $APPLICATION->GetCurPage() ?>?mid=<?= htmlspecialcharsbx($mid) ?>&lang=<?= LANGUAGE_ID ?>">
<div class="ui-form">
    <div class="ui-form-row">
        <div class="ui-form-label">
            <div class="ui-ctl-label-text">Название</div>
        </div>
        <div class="ui-form-content">
            <div class="ui-ctl ui-ctl-textbox ui-ctl-w100">
                <input type="text" class="ui-ctl-element" placeholder="Название">
            </div>
        </div>
    </div>
    <div class="ui-form-row">
        <div class="ui-form-label">
            <div class="ui-ctl-label-text">Сортировка</div>
        </div>
        <div class="ui-form-content">
            <div class="ui-ctl ui-ctl-textbox ui-ctl-w100">
                <input type="number" class="ui-ctl-element" placeholder="Сортировка">
            </div>
        </div>
    </div>
    <div class="ui-form-row">
        <div class="ui-form-label">
            <div class="ui-ctl-label-text">Описание</div>
        </div>
        <div class="ui-form-content">
            <div class="ui-ctl ui-ctl-textarea ui-ctl-w100">
                <textarea class="ui-ctl-element"></textarea>
            </div>
        </div>
    </div>
    <div class="ui-form-row">
        <div class="ui-form-label">
            <div class="ui-ctl-label-text">Фото книги</div>
        </div>
        <div class="ui-form-content">
            <div class="ui-ctl ui-ctl-textarea ui-ctl-w100">
                <label class="ui-ctl ui-ctl-file-btn">
                    <input type="file" class="ui-ctl-element">
                    <div class="ui-ctl-label-text">Добавить фотографию</div>
                </label>
            </div>
        </div>
    </div>
</div>

<!-- .ui-btn-container.ui-btn-container-center > .ui-btn.ui-btn-success + .ui-btn.ui-btn-link-->
<div class="ui-btn-container ui-btn-container-center">
    <input type="submit" class="ui-btn ui-btn-success"  name="submit"  value="Сохранить" id="" title="Сохранить и перейти к просмотру">
    <input type="button" class="ui-btn ui-btn-link"  name="cancel" value="Отменить" id="" title="Не сохранять и вернуться">
</div>
</form>

<!--n-->
<!--ext_core-->
<!--| tknovosib_base  |-->
<!--finished | ext_kernel | Y | N | /home/bitrix/ext_www/tknovosib/core-->
<!---->
<!--corp.demo.tknsib.ru | tknovosib_base  |        finished |-->
<!--link | /home/bitrix/ext_www/tknovosib/public/corp.tknovosib.ru-->
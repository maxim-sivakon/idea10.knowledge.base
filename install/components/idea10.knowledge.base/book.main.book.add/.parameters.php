<?php
defined('B_PROLOG_INCLUDED') || die;

use Bitrix\Main\Localization\Loc;

$arComponentParameters = array(
    'PARAMETERS' => array(
        'SEF_MODE' => array(
            'details' => array(
                'NAME' => 'Detail',
                'DEFAULT' => '#BOOK_ID#/',
                'VARIABLES' => array('BOOK_ID')
            ),
            'edit' => array(
                'NAME' => 'edit',
                'DEFAULT' => '#BOOK_ID#/edit/',
                'VARIABLES' => array('BOOK_ID')
            )
        )
    )
);

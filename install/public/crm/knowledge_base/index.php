<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

$APPLICATION->IncludeComponent(
	'idea10.knowledge.base:book.main.interface',
	'', 
	array(
		'SEF_MODE' => 'Y',
		'SEF_FOLDER' => '/crm/knowledge_base/',
		'SEF_URL_TEMPLATES' => array(
            'add' => 'add/',
            'list' => 'list/',
            'edit' => '#BOOK_ID#/edit/',
            'detail' => '#BOOK_ID#/detail/'
		)
	),
	false
);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
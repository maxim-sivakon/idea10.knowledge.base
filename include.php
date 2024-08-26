<?php

include(dirname(__FILE__) . '/core/autoload.php');

$moduleClasses = [
    "Idea10\Knowledge\Base\Entity\knowledgeBaseTable" => "lib/entity/knowledgeBase.php",
    "Idea10\Knowledge\Base\Handler\CrmMenu"           => "lib/handler/crmmenu.php"
];

CModule::AddAutoloadClasses(
    'idea10.knowledge.base',
    array_merge($moduleClasses, autoLoadClassesForModules('', 'Idea10\Knowledge\Base'))
);

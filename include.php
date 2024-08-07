<?php
CModule::AddAutoloadClasses(
    'idea10.knowledge.base',
    [
        "Idea10\Knowledge\Base\Entity\knowledgeBaseTable" => "lib/entity/knowledgeBase.php",
        "Idea10\Knowledge\Base\Handler\CrmMenu"           => "lib/handler/crmmenu.php"
    ]
);

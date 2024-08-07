<?php
defined('B_PROLOG_INCLUDED') || die;

use Idea10\Knowledge\Base\Entity\knowledgeBaseTable;
use Bitrix\Main\Application;
use Bitrix\Main\Config\Option;
use Bitrix\Main\EventManager;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

class idea10_knowledge_base extends CModule
{
    const MODULE_ID = 'idea10.knowledge.base';
    var $MODULE_ID = self::MODULE_ID;
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;
    var $strError = '';

    function __construct()
    {
        $arModuleVersion = array();
        include(dirname(__FILE__) . '/version.php');
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];

        $this->MODULE_NAME = 'База знаний';
        $this->MODULE_DESCRIPTION = 'Описание модуля Базы знаний';

        $this->PARTNER_NAME = 'idea10';
        $this->PARTNER_URI = 'www.idea10.ru';
    }

    function DoInstall()
    {
        ModuleManager::registerModule(self::MODULE_ID);

        $this->InstallDB();
        $this->InstallFiles();
        $this->InstallEvents();
    }

    function DoUninstall()
    {
        $this->UnInstallEvents();
        $this->UnInstallFiles();
        $this->UnInstallDB();

        ModuleManager::unRegisterModule(self::MODULE_ID);
    }

    function InstallDB()
    {
        Loader::includeModule(self::MODULE_ID);

        $db = Application::getConnection();

        $knowledgeBaseEntity = knowledgeBaseTable::getEntity();
        if (!$db->isTableExists($knowledgeBaseEntity->getDBTableName())) {
            $knowledgeBaseEntity->createDbTable();
        }
    }

    function UnInstallDB()
    {
        // Не существенно в данном примере.
    }

    function InstallEvents()
    {
        $eventManager = EventManager::getInstance();

        $eventManager->registerEventHandlerCompatible(
            'crm',
            'OnAfterCrmControlPanelBuild',
            self::MODULE_ID,
            '\Idea10\Knowledge\Base\Handler\CrmMenu',
            'addKnowledgeBaseMenu'
        );

//        $eventManager->registerEventHandlerCompatible(
//            'main',
//            'OnUserTypeBuildList',
//            self::MODULE_ID,
//            '\Academy\CrmStores\UserType\StoreBinding',
//            'GetUserTypeDescription'
//        );
    }

    function UnInstallEvents()
    {
        $eventManager = EventManager::getInstance();

        $eventManager->unRegisterEventHandler(
            'crm',
            'OnAfterCrmControlPanelBuild',
            self::MODULE_ID,
            '\Idea10\Knowledge\Base\Handler\CrmMenu',
            'addKnowledgeBaseMenu'
        );

//        $eventManager->unRegisterEventHandler(
//            'main',
//            'OnUserTypeBuildList',
//            self::MODULE_ID,
//            '\Academy\CrmStores\UserType\StoreBinding',
//            'GetUserTypeDescription'
//        );
    }

    function InstallFiles()
    {
        $documentRoot = Application::getDocumentRoot();

        CopyDirFiles(
            __DIR__ . '/components',
            $documentRoot . '/local/components',
            true,
            true
        );

        CopyDirFiles(
            __DIR__ . '/public/crm',
            $documentRoot . '/crm',
            true,
            true
        );

        CUrlRewriter::Add(array(
            'CONDITION' => '#^/crm/knowledge_base/#',
            'RULE' => '',
            'ID' => 'idea10.knowledge.base:book.main.interface',
            'PATH' => '/crm/knowledge_base/index.php',
        ));
    }

    function UnInstallFiles()
    {
        DeleteDirFilesEx('/crm/knowledge_base');
        DeleteDirFilesEx('/local/components/idea10.knowledge.base');

        CUrlRewriter::Delete(array(
            'ID' => 'idea10.knowledge.base:book.main.interface',
            'PATH' => '/crm/knowledge_base/index.php',
        ));
    }
}
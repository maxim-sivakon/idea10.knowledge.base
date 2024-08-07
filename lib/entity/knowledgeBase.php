<?php

namespace Idea10\Knowledge\Base\Entity;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\DatetimeField;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\UserTable;

class knowledgeBaseTable extends DataManager
{
    public static function getTableName()
    {
        return 'idea10_knowledge_base';
    }

    public static function getMap()
    {
        return [
            new IntegerField('ID', ['primary' => true, 'autocomplete' => true]),
            new StringField('ACTIVE'),
            new StringField('NAME'),
            new IntegerField('IMAGE'),
            new IntegerField('SORT'),
            new StringField('DESCRIPTION'),
            new DatetimeField('DATE_CREATE',
                ['required' => true, 'default_value' => static function () { return new DateTime(); }]),
            new ReferenceField('ASSIGNED_BY', UserTable::getEntity(), ['=this.ASSIGNED_BY_ID' => 'ref.ID']),
        ];
    }
}
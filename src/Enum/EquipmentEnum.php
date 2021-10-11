<?php
declare(strict_types=1);

namespace Dashboard\Enum;

final class EquipmentEnum {
    public const EQUIPMENT_PORTABLE_TOILET = 'portable_toilet';
    public const EQUIPMENT_BED_SHEETS = 'bed_sheets';
    public const EQUIPMENT_SLEEPING_BAGS = 'sleeping_bags';
    public const EQUIPMENT_CAMPING_TABLES = 'camping_tables';
    public const EQUIPMENT_CHAIRS = 'chairs';

    public const EQUIPMENT_TEXT = [
        self::EQUIPMENT_PORTABLE_TOILET => 'toilets',
        self::EQUIPMENT_BED_SHEETS => 'bed sheets',
        self::EQUIPMENT_SLEEPING_BAGS => 'sleeping bags',
        self::EQUIPMENT_CAMPING_TABLES => 'camping tables',
        self::EQUIPMENT_CHAIRS => 'chairs'
    ];

}
<?php
declare(strict_types=1);

namespace Dashboard\ValueObjects;

use Dashboard\Collection\EquipmentCollection;

final class StationObject
{
    private string $name;
    private EquipmentCollection $equipments;

    public function __construct(string $name, EquipmentCollection $collection)
    {
        $this->name = $name;
        $this->equipments = $collection;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEquipments(): EquipmentCollection
    {
        return $this->equipments;
    }

}
<?php
declare(strict_types=1);

namespace Dashboard\ValueObjects;

use Dashboard\Collection\EquipmentCollection;

final class OrderObject
{
    private string $station;
    private \DateTimeImmutable $startDate;
    private \DateTimeImmutable $endDate;
    private EquipmentCollection $equipments;

    public function __construct(
        string $station,
        \DateTimeImmutable $startDate,
        \DateTimeImmutable $endDate,
        EquipmentCollection $collection
    ) {
        $this->station = $station;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->equipments = $collection;
    }


    public function getStation(): string
    {
        return $this->station;
    }

    public function getStartDate(): \DateTimeImmutable
    {
        return $this->startDate;
    }

    public function getEndDate(): \DateTimeImmutable
    {
        return $this->endDate;
    }

    public function getEquipments(): EquipmentCollection
    {
        return $this->equipments;
    }

}
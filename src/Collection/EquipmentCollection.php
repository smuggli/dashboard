<?php
declare(strict_types=1);

namespace Dashboard\Collection;

use Dashboard\ValueObjects\EquipmentObject;
use Ramsey\Collection\AbstractCollection;

final class EquipmentCollection extends AbstractCollection
{
    public function getType(): string
    {
        return EquipmentObject::class;
    }
}

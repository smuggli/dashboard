<?php
declare(strict_types=1);

namespace Dashboard\Collection;

use Dashboard\ValueObjects\StationObject;
use Ramsey\Collection\AbstractCollection;

final class StationCollection extends AbstractCollection
{
    public function getType(): string
    {
        return StationObject::class;
    }
}

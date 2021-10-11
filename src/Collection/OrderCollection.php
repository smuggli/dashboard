<?php
declare(strict_types=1);

namespace Dashboard\Collection;

use Dashboard\ValueObjects\OrderObject;
use Ramsey\Collection\AbstractCollection;

final class OrderCollection extends AbstractCollection
{
    public function getType(): string
    {
        return OrderObject::class;
    }
}

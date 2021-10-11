<?php
declare(strict_types=1);

namespace Dashboard\Repository;

use Ramsey\Collection\AbstractCollection;

interface RepositoryInterface
{
    public function fetchAll(): AbstractCollection;
}
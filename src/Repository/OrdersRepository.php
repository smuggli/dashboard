<?php
declare(strict_types=1);

namespace Dashboard\Repository;

use Dashboard\Collection\EquipmentCollection;
use Dashboard\Collection\OrderCollection;
use Dashboard\ValueObjects\EquipmentObject;
use Dashboard\ValueObjects\OrderObject;
use Ramsey\Collection\AbstractCollection;

final class OrdersRepository implements RepositoryInterface
{
    public function fetchAll(): AbstractCollection
    {
        $data = require dirname(__FILE__) . '/Data/OrdersData.php';

        $collection = new OrderCollection();

        foreach ($data as $order) {
            $equipmentCollection = new EquipmentCollection();

            foreach ($order['equipment'] as $equipment => $amount) {
                $equipmentCollection->add(new EquipmentObject($equipment, $amount));
            }

            $collection->add(
                new OrderObject(
                    $order['station'],
                    new \DateTimeImmutable($order['startDate']),
                    new \DateTimeImmutable($order['endDate']),
                    $equipmentCollection
                )
            );
        }

        return $collection;
    }
}
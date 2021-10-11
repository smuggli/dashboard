<?php
declare(strict_types=1);

namespace Dashboard\Repository;

use Dashboard\Collection\EquipmentCollection;
use Dashboard\Collection\StationCollection;
use Dashboard\ValueObjects\EquipmentObject;
use Dashboard\ValueObjects\StationObject;
use Ramsey\Collection\AbstractCollection;

final class StationsRepository implements RepositoryInterface {

    public function fetchAll(): AbstractCollection
    {
        $data = require dirname(__FILE__) . '/Data/StationsData.php';

        $collection = new StationCollection();

        foreach ($data as $station => $stationData) {
            $equipmentCollection = new EquipmentCollection();

            foreach ($stationData as $equipment => $amount) {
                $equipmentCollection->add(new EquipmentObject($equipment, $amount));
            }

            $collection->add(new StationObject($station, $equipmentCollection));
        }

        return $collection;
    }
}
<?php
declare(strict_types=1);

namespace Dashboard\Service;

use Dashboard\Helper\DateHelper;
use Dashboard\Repository\OrdersRepository;
use Dashboard\Repository\StationsRepository;
use Dashboard\ValueObjects\EquipmentObject;
use Dashboard\ValueObjects\OrderObject;
use Dashboard\ValueObjects\StationObject;

final class OrdersService
{
    private OrdersRepository $ordersRepository;
    private StationsRepository $stationsRepository;

    public function __construct(OrdersRepository $ordersRepository, StationsRepository $stationsRepository)
    {
        $this->ordersRepository = $ordersRepository;
        $this->stationsRepository = $stationsRepository;
    }

    public function getAggregatedStationData(): array
    {
        $tmp = [];
        $orders = $this->ordersRepository->fetchAll();
        $stations = $this->stationsRepository->fetchAll();

        /** @var OrderObject $order */
        foreach ($orders as $order) {
            $period = DateHelper::getTimeRangeByStartAndEnd($order->getStartDate(), $order->getEndDate());

            foreach ($period as $date) {
                $dateStr = $date->format('Y-m-d');

                /** @var EquipmentObject $equipment */
                foreach ($order->getEquipments() as $equipment) {
                    if (isset($tmp[$order->getStation()][$dateStr][$equipment->getName()])) {
                        $tmp[$order->getStation()][$dateStr][$equipment->getName()]['demand'] += $equipment->getAmount();
                    } else {
                        $tmp[$order->getStation()][$dateStr][$equipment->getName()]['demand'] = $equipment->getAmount();
                    }
                }

                /** @var StationObject $station */
                $station = $stations->where('getName', $order->getStation())->first();

                foreach ($tmp[$order->getStation()][$dateStr] as $equipment => $data) {
                    /** @var EquipmentObject $equipmentObject */
                    $equipmentObject = $station->getEquipments()->where('getName', $equipment)->first();

                    $tmp[$order->getStation()][$dateStr][$equipment] = [
                        'demand' => $data['demand'],
                        'available' => $equipmentObject->getAmount() - $data['demand']
                    ];
                }
            }
        }

        return $tmp;
    }

}
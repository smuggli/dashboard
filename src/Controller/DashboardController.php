<?php

namespace Dashboard\Controller;

use Dashboard\Enum\EquipmentEnum;
use Dashboard\Helper\DateHelper;
use Dashboard\Service\OrdersService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    private OrdersService $service;

    public function __construct(OrdersService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/", name="dashboard")
     */
    public function index(): Response
    {
        return $this->render(
            'dashboard/dashboard.html.twig',
            [
                'period' => DateHelper::getDashboardTimeRange(),
                'data' => $this->service->getAggregatedStationData(),
                'equipmentText' => EquipmentEnum::EQUIPMENT_TEXT
            ]
        );
    }
}

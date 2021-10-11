<?php
declare(strict_types=1);

namespace Dashboard\Controller;

use Dashboard\Enum\EquipmentEnum;
use Dashboard\Helper\DateHelper;
use Dashboard\Service\OrdersService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function in_array;

class ApiController extends AbstractController
{
    private const FORMAT_JSON = 'json';
    private const FORMAT_HTML = 'html';

    private const ALLOWED_FORMATS = [
        self::FORMAT_JSON, self::FORMAT_HTML
    ];

    private OrdersService $service;

    public function __construct(OrdersService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/api.{_format}", name="api", defaults={"_format": "json"})
     */
    public function index(Request $request): Response
    {
        $format = $request->get('_format');

        if ($format !== null && !in_array($format, self::ALLOWED_FORMATS, true)) {
            return $this->json([
                'error' => 'Format not supported'
            ], 400);
        }

        return $this->generateResponse($format);
    }

    private function generateResponse(?string $format): Response
    {
        if ($format === null || $format === self::FORMAT_JSON) {
            return $this->json($this->service->getAggregatedStationData());
        } else {
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
}

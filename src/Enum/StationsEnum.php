<?php
declare(strict_types=1);

namespace Dashboard\Enum;

final class StationsEnum {
    public const STATION_MUNICH = 'munich';
    public const STATION_PARIS = 'paris';
    public const STATION_PORTO = 'porto';
    public const STATION_MADRID = 'madrid';

    public const STATIONS = [
        self::STATION_MUNICH,
        self::STATION_PARIS,
        self::STATION_PORTO,
        self::STATION_MADRID
    ];
}
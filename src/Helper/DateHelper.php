<?php
declare(strict_types=1);

namespace Dashboard\Helper;

final class DateHelper
{
    public static function getDashboardTimeRange(): \DatePeriod
    {
        return new \DatePeriod(
            new \DateTime(),
            new \DateInterval('P1D'),
            new \DateTime('+30 days')
        );
    }

    public static function getTimeRangeByStartAndEnd(
        \DateTimeInterface $start,
        \DateTimeInterface $end
    ): \DatePeriod {
        return new \DatePeriod(
            $start,
            new \DateInterval('P1D'),
            $end
        );
    }
}
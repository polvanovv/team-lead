<?php

declare(strict_types=1);

namespace App\Entity\TeamLead\Service;

/**
 * Class JuniorResultGenerator
 *
 * @package App\Entity\Service
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class JuniorResultGenerator
{
    /**
     * @return int
     */
    public static function generateResult(): int
    {
        return rand(0, 1);
    }

    /**
     * @return int
     */
    public static function successResult(): int
    {
        return 1;
    }

    /**
     * @return int
     */
    public static function failureResult(): int
    {
        return 0;
    }
}
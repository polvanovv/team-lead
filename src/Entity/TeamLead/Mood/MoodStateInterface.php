<?php

declare(strict_types=1);


namespace App\Entity\TeamLead\Mood;

/**
 * Interface MoodStateInterface
 *
 * @package App\Entity\TeamLead\Mood
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
interface MoodStateInterface
{
    /**
     * @return int
     */
    public function getStepUpWeight(): int;

    /**
     * @return int
     */
    public function getStepDownWeight(): int;

    /**
     * @return string
     */
    public function getMoodName(): string;
}
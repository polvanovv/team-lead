<?php

declare(strict_types=1);


namespace App\Entity\TeamLead\Mood;


abstract class AbstractBaseMoodState implements MoodStateInterface
{

    /**
     * @return int
     */
    abstract public function getStepUpWeight(): int;

    /**
     * @return int
     */
    abstract public function getStepDownWeight(): int;

    /**
     * @return string
     */
    abstract public function getMoodName(): string;

}
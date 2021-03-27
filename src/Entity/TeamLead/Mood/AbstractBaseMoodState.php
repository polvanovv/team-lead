<?php

declare(strict_types=1);


namespace App\Entity\TeamLead\Mood;


abstract class AbstractBaseMoodState implements MoodStateInterface
{
    /**
     * @var string
     */
    protected $moodName;

    /**
     * @var int
     */
    protected $stepUpWeight;

    /**
     * @var int
     */
    protected $stepDownWeight;

    /**
     * BadMoodState constructor.
     *
     * @param int $stepUpWeight
     * @param int $stepDownWeight
     */
    public function __construct(int $stepUpWeight = 1, int $stepDownWeight = 1)
    {
        $this->moodName       = 'base mood';
        $this->stepUpWeight   = $stepUpWeight;
        $this->stepDownWeight = $stepDownWeight;
    }

    /**
     * @return int
     */
    public function getStepUpWeight(): int
    {
        return $this->stepUpWeight;
    }

    /**
     * @return int
     */
    public function getStepDownWeight(): int
    {
        return $this->stepDownWeight;
    }

    /**
     * @return string
     */
    public function getMoodName(): string
    {
        return $this->moodName;
    }

}
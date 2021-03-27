<?php

declare(strict_types=1);


namespace App\Entity\TeamLead\Mood;


/**
 * Class FineMoodState
 *
 * @package App\Entity\TeamLead\Mood
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class FineMoodState extends AbstractBaseMoodState
{
    /**
     * @var string
     */
    private $moodName;

    /**
     * @var int
     */
    private $stepUpWeight;

    /**
     * @var int
     */
    private $stepDownWeight;

    /**
     * FineMoodState constructor.
     *
     * @param int $stepUpWeight
     * @param int $stepDownWeight
     */
    public function __construct(int $stepUpWeight = 1, int $stepDownWeight = 1)
    {
        $this->moodName       = 'fine mood';
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
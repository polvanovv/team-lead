<?php

declare(strict_types=1);


namespace App\Entity\TeamLead\Mood;

/**
 * Class WorstMoodState
 *
 * @package App\Entity\TeamLead\Mood
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class WorstMoodState extends BaseMoodState
{

    /**
     * WorstMoodState constructor.
     *
     * @param int $stepUpWeight
     * @param int $stepDownWeight
     */
    public function __construct(int $stepUpWeight = 1, int $stepDownWeight = 1)
    {
        parent::__construct();
        $this->moodName       = 'worst mood';
        $this->stepUpWeight   = $stepUpWeight;
        $this->stepDownWeight = $stepDownWeight;
    }

}
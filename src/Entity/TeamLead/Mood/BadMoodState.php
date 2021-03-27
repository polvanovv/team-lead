<?php

declare(strict_types=1);


namespace App\Entity\TeamLead\Mood;


/**
 * Class BadMoodState
 *
 * @package App\Entity\TeamLead\Mood
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class BadMoodState extends AbstractBaseMoodState
{

    /**
     * BadMoodState constructor.
     *
     * @param int $stepUpWeight
     * @param int $stepDownWeight
     */
    public function __construct(int $stepUpWeight = 1, int $stepDownWeight = 1)
    {
        parent::__construct();
        $this->moodName       = 'bad mood';
        $this->stepUpWeight   = $stepUpWeight;
        $this->stepDownWeight = $stepDownWeight;
    }

}
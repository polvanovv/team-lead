<?php

declare(strict_types=1);


namespace App\Entity\TeamLead\Mood;


/**
 * Class GoodMoodState
 *
 * @package App\Entity\TeamLead\Mood
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class GoodMoodState extends BaseMoodState
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
     * GoodMoodState constructor.
     *
     * @param int $stepUpWeight
     * @param int $stepDownWeight
     */
    public function __construct(int $stepUpWeight = 1, int $stepDownWeight = 1)
    {
        parent::__construct();
        $this->moodName       = 'good mood';
        $this->stepUpWeight   = $stepUpWeight;
        $this->stepDownWeight = $stepDownWeight;
    }

}
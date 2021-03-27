<?php

declare(strict_types=1);


namespace App\Entity\TeamLead\Mood;

use Webmozart\Assert\Assert;

/**
 * Class LeadState
 *
 * @package App\Entity\TeamLead
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class Mood
{

    /**
     * All available mood state classes
     *
     * @var string[]
     */
    private $moodStates = [
        WorstMoodState::class,
        BadMoodState::class,
        FineMoodState::class,
        GoodMoodState::class,
    ];

    /**
     * @var MoodStateInterface
     */
    private  $moodStateClass;

    /**
     * Mood constructor.
     *
     * @param MoodStateInterface $moodStateClass
     */
    public function __construct(MoodStateInterface $moodStateClass)
    {
        Assert::oneOf(get_class($moodStateClass), $this->moodStates);
        $this->moodStateClass = $moodStateClass;
    }

    /**
     * Up state of the mood.
     * Finds the index of the current mood state in an array of states.
     * And it returns a new state of mood depending on the weight of the step up.
     * If the mood state is already good or
     * the $moodStates index is higher than the sum of $moodStates items, it returns GoodMoodState.
     *
     * @return $this|Mood
     */
    public function stepUpMoodState(): Mood
    {
        if (get_class($this->getMoodStateClass()) == GoodMoodState::class) {
            return $this;
        }

        $moodStateKey = array_search(get_class($this->getMoodStateClass()), $this->moodStates);

        if (($moodStateKey + $this->moodStateClass->getStepUpWeight()) > count($this->moodStates)) {
            return new self(new GoodMoodState());
        }

        return new self(new $this->moodStates[($moodStateKey) + ($this->moodStateClass->getStepUpWeight())]
        );
    }

    /**
     * Down state of the mood.
     * Finds the index of the current state of the mood in the array of states.
     * And returns a new state of mood depending on the weight of the step down.
     * If mood state is already worst or index of $moodStates lower then zero, it returns WorstMoodState.
     *
     * @return $this|Mood
     */
    public function stepDownMoodState(): Mood
    {
        if (get_class($this->getMoodStateClass()) == WorstMoodState::class) {
            return $this;
        }

        $moodStateKey = array_search(get_class($this->getMoodStateClass()), $this->moodStates);

        if (($moodStateKey - $this->moodStateClass->getStepDownWeight()) < 0) {
            return new self(new WorstMoodState());
        }

        return new self(
            new $this->moodStates[
                ($moodStateKey) - $this->moodStateClass->getStepDownWeight()
            ]
        );
    }

    /**
     *
     * @return MoodStateInterface
     */
    public function getMoodStateClass(): MoodStateInterface
    {
        return $this->moodStateClass;
    }

    /**
     * @return bool
     */
    public function isTimeToPraise(): bool
    {
        return get_class($this->moodStateClass) == $this->moodStates[array_key_last($this->moodStates)];
    }

    /**
     * @return bool
     */
    public function isTimeToReprimand(): bool
    {
        return get_class($this->moodStateClass) == $this->moodStates[array_key_first($this->moodStates)];
    }
}
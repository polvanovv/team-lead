<?php

declare(strict_types=1);


namespace App\Entity\TeamLead;

use App\Entity\TeamLead\Mood\Mood;
use App\Entity\TeamLead\Mood\MoodStateInterface;
use App\Service\PhraseGenerator;
use SplObjectStorage;
use SplObserver;

/**
 * Class TeamLead
 *
 * @package App\Model\TeamLead\Entity\TeamLead
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class TeamLead implements \SplSubject
{
    /**
     * @var Mood
     */
    private  $mood;

    /**
     * TeamLead phrase
     *
     * @var string
     */
    private  $phrase;

    /**
     * @var SplObjectStorage
     */
    private $observers;


    /**
     * TeamLead constructor.
     *
     * @param Mood $mood
     */
    public function __construct(Mood $mood)
    {
        $this->mood      = $mood;
        $this->observers = new SplObjectStorage();
    }

    /**
     * Calls the required function depending on the result of the programmer.
     *
     * @param int $juniorResult
     */
    public function leadReaction(int $juniorResult)
    {
        if ($juniorResult) {
            $this->upMoodState();

            return;
        }

        $this->downMoodState();
    }

    /**
     * Sets a higher mood. Sets the desired phrase. Notifies if necessary.
     */
    public function upMoodState()
    {
        if ($this->mood->isTimeToPraise()) {
            $this->notify();
        }

        $this->phrase = PhraseGenerator::success();
        $this->mood   = $this->mood->stepUpMoodState();
    }

    /**
     * Sets a lower mood. Sets the desired phrase. Notifies if necessary.
     */
    public function downMoodState()
    {
        if ($this->mood->isTimeToReprimand()) {
            $this->notify();
        }

        $this->phrase = PhraseGenerator::failure();
        $this->mood   = $this->mood->stepDownMoodState();
    }

    /**
     * @return string
     */
    public function getPhrase(): string
    {
        return $this->phrase->getText();
    }

    /**
     * @return MoodStateInterface
     */
    public function getMood(): MoodStateInterface
    {
        return $this->mood->getMoodStateClass();
    }


    /**
     * Attach observer
     *
     * @param SplObserver $observer
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * Detach observer
     *
     * @param SplObserver $observer
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * Notifies observers
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
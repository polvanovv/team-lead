<?php

declare(strict_types=1);


namespace App\Entity\TeamLead;

use App\Entity\HumanResources\HumanResources;
use App\Entity\Manager\Manager;
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
     * @var LeadState
     */
    private LeadState $state;

    /**
     * @var LeadMessage
     */
    private LeadMessage $message;

    /**
     * @var int
     */
    private static int $praiseCount = 0;

    /**
     * @var int
     */
    private static int $reprimandCount = 0;

    /**
     * @var SplObjectStorage
     */
    private SplObjectStorage $observers;


    /**
     * TeamLead constructor.
     *
     * @param LeadState $state
     */
    public function __construct(LeadState $state)
    {
        $this->state = $state;
        $this->observers = new SplObjectStorage();
    }

    /**
     * @param int $juniorResult
     */
    public function leadReaction(int $juniorResult)
    {
        if ($juniorResult) {
            $this->riseState();

            return;
        }

        $this->downState();
    }

    public function riseState()
    {
        if ($this->state->isTimeToPraise()) {
            $this->increasePraiseCount();
            $this->notify();
        }

        $this->message = LeadMessage::success();
        $this->state   = $this->state->stepUpState();
    }

    public function downState()
    {
        if ($this->state->isTimeToReprimand()) {
            $this->increaseReprimandCount();
            $this->notify();
        }

        $this->message = LeadMessage::failure();
        $this->state   = $this->state->stepDownState();
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message->getText();
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state->getName();
    }

    /**
     * @return int
     */
    public function increasePraiseCount(): int
    {
        return self::$praiseCount += 1;

    }

    /**
     * @return int
     */
    public function increaseReprimandCount(): int
    {
        return self::$reprimandCount += 1;
    }

    /**
     * @return int
     */
    public static function getPraiseCount(): int
    {
        return self::$praiseCount;
    }

    /**
     * @return int
     */
    public static function getReprimandCount(): int
    {
        return self::$reprimandCount;
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
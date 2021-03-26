<?php

declare(strict_types=1);


namespace App\Model\TeamLead\Entity\TeamLead;

use App\Model\HumanResources\Entity\HumanResources\HumanResources;
use App\Model\Manager\Entity\Manager\Manager;
use App\Model\TeamLead\Entity\Service\JuniorResultGenerator;
use App\Model\TeamLead\Entity\TeamLead\Event\EventChanel;
use App\Model\TeamLead\Entity\TeamLead\Event\Publisher;

/**
 * Class TeamLead
 *
 * @package App\Model\TeamLead\Entity\TeamLead
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class TeamLead
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
     * @var EventChanel
     */
    private EventChanel $eventChanel;

    /**
     * @var Publisher
     */
    private Publisher $praisePublisher;

    /**
     * @var Publisher
     */
    private Publisher $reprimandPublisher;

    /**
     * @var int
     */
    private static int $praiseCount = 0;

    /**
     * @var int
     */
    private static int $reprimandCount = 0;
    /**
     * @var Manager
     */
    private Manager $manager;
    /**
     * @var HumanResources
     */
    private HumanResources $hr;


    /**
     * TeamLead constructor.
     *
     * @param LeadState $state
     */
    public function __construct(LeadState $state)
    {
        $this->state              = $state;
        $this->eventChanel        = new EventChanel();
        $this->praisePublisher    = new Publisher('praise', $this->eventChanel);
        $this->reprimandPublisher = new Publisher('reprimand', $this->eventChanel);
        $this->manager            = new Manager();
        $this->hr                 = new HumanResources();

        $this->eventChanel->subscribe('praise', $this->manager);
        $this->eventChanel->subscribe('reprimand', $this->hr);
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

            $this->praisePublisher->publish(self::$praiseCount);
        }

        $this->message = LeadMessage::success();
        $this->state   = $this->state->stepUpState();
    }

    public function downState()
    {
        if ($this->state->isTimeToReprimand()) {
            $this->increaseReprimandCount();

            $this->reprimandPublisher->publish(self::$reprimandCount);
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
        $result = self::$praiseCount += 1;

        return $result;
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

    /**
     * @return Manager
     */
    public function getManager(): Manager
    {
        return $this->manager;
    }

    /**
     * @return HumanResources
     */
    public function getHr(): HumanResources
    {
        return $this->hr;
    }


}
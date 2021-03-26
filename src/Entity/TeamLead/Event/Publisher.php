<?php

declare(strict_types=1);


namespace App\Entity\TeamLead\Event;


use App\Entity\EventChanelInterface;
use App\Entity\PublisherInterface;

/**
 * Class Publisher
 *
 * @package App\Entity\TeamLead\Event
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class Publisher implements PublisherInterface
{

    /**
     * @var string
     */
    private string $topic;

    /**
     * @var EventChanelInterface
     */
    private EventChanelInterface $eventChanel;

    /**
     * Publisher constructor.
     *
     * @param string               $topic
     * @param EventChanelInterface $eventChanel
     */
    public function __construct(string $topic, EventChanelInterface $eventChanel)
    {
        $this->topic = $topic;
        $this->eventChanel = $eventChanel;
    }

    /**
     * @param $data
     *
     * @return mixed|void
     */
    public function publish($data)
    {
        $this->eventChanel->publish($this->topic, $data);
    }
}
<?php

declare(strict_types=1);

namespace App\Entity\TeamLead\Event;

use App\Entity\EventChanelInterface;
use App\Entity\SubscriberInterface;

/**
 * Class EventChanel
 *
 * @package App\Entity\TeamLead\Event
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class EventChanel implements EventChanelInterface
{

    /**
     * @var array
     */
    private array $topics = [];

    /**
     * @param $topic
     * @param $data
     */
    public function publish($topic, $data)
    {
        if (empty($this->topics)) {
            return;
        }

        foreach ($this->topics[$topic] as $subscriber) {
            $subscriber->update($data);
        }
    }

    /**
     * @param                     $topic
     * @param SubscriberInterface $subscriber
     */
    public function subscribe($topic, SubscriberInterface $subscriber)
    {
        $this->topics[$topic][] = $subscriber;
    }
}
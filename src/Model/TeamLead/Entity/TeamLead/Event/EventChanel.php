<?php

declare(strict_types=1);

namespace App\Model\TeamLead\Entity\TeamLead\Event;

use App\Model\EventChanelInterface;
use App\Model\SubscriberInterface;

/**
 * Class EventChanel
 *
 * @package App\Model\TeamLead\Entity\TeamLead\Event
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
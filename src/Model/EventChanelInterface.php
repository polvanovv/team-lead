<?php

declare(strict_types=1);


namespace App\Model;

/**
 * Interface EventChanelInterface
 *
 * @package App\Model\Interfaces
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
interface EventChanelInterface
{
    /**
     * @param $topic
     * @param $data
     *
     * @return mixed
     */
    public function publish($topic, $data);

    /**
     * @param                     $topic
     * @param SubscriberInterface $subscriber
     *
     * @return mixed
     */
    public function subscribe($topic, SubscriberInterface $subscriber);
}
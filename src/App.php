<?php

declare(strict_types=1);

namespace App;

use App\Entity\HumanResources\HumanResources;
use App\Entity\Manager\Manager;
use App\Entity\TeamLead\Event\EventChanel;
use App\Entity\TeamLead\Event\Publisher;

/**
 * Class App
 *
 * @package App
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class App
{
    public function run()
    {
        $eventChanel = new EventChanel();

        $praisePublisher    = new Publisher('praise', $eventChanel);
        $reprimandPublisher = new Publisher('reprimand', $eventChanel);

        $manager = new Manager();
        $hr      = new HumanResources();

        $eventChanel->subscribe('praise', $manager);
        $eventChanel->subscribe('reprimand', $hr);

        $praisePublisher->publish(5);
        $reprimandPublisher->publish(7);
    }
}
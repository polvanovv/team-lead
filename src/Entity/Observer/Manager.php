<?php

declare(strict_types=1);


namespace App\Entity\Observer;


/**
 * Class Manager
 *
 * @package App\Entity\Manager
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class Manager extends AbstractObserver
{
    /**
     * @var array
     */
    protected static $workResults = [];
}
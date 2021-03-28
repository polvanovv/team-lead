<?php

declare(strict_types=1);


namespace App\Entity\Observer;


/**
 * Class HumanResources
 *
 * @package App\Model\HumanResources\Entity\HumanResources
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class HumanResources extends AbstractObserver
{
    /**
     * @var array
     */
    protected static $workResults = [];
}
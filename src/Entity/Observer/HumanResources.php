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
    private static $workResults = [];

    /**
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        self::$workResults[] = $subject;
    }

    /**
     * @return int
     */
    public function getWorkResults(): int
    {
        return  count(self::$workResults);
    }
}
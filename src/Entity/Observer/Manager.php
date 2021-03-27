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
        return count(self::$workResults);
    }
}
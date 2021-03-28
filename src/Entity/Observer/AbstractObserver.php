<?php

declare(strict_types=1);


namespace App\Entity\Observer;


abstract class AbstractObserver implements \SplObserver
{
    /**
     * @var array
     */
    protected static $workResults = [];

    /**
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        static::$workResults[] = $subject;
    }

    /**
     * @return int
     */
    public function getWorkResults(): int
    {
        return  count(static::$workResults);
    }
}
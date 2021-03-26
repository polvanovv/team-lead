<?php

declare(strict_types=1);


namespace App\Entity\Manager;


use App\Entity\TeamLead\TeamLead;

/**
 * Class Manager
 *
 * @package App\Entity\Manager
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class Manager implements \SplObserver
{

    private int $successes;

    /**
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        /** @var TeamLead $subject */
        $this->successes = $subject->getPraiseCount();
    }

    /**
     * @return int
     */
    public function getSuccesses(): int
    {
        return $this->successes;
    }
}
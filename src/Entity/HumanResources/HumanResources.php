<?php

declare(strict_types=1);


namespace App\Entity\HumanResources;


use App\Entity\TeamLead\TeamLead;

/**
 * Class HumanResources
 *
 * @package App\Model\HumanResources\Entity\HumanResources
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class HumanResources implements \SplObserver
{
    /**
     * @var int
     */
    private int $failures;

    /**
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        /** @var TeamLead reprimandCount */
        $this->failures = $subject->getReprimandCount();
    }

    /**
     * @return int
     */
    public function getFailuresCount(): int
    {
        return $this->failures;
    }
}
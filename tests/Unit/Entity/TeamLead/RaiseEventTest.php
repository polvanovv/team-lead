<?php

declare(strict_types=1);


namespace App\Test\Unit\Entity\TeamLead;


use App\Entity\Manager\Manager;
use App\Entity\TeamLead\Service\JuniorResultGenerator;
use App\Entity\TeamLead\LeadState;
use App\Entity\TeamLead\TeamLead;
use PHPUnit\Framework\TestCase;

class RaiseEventTest extends TestCase
{
    public function testSuccessDoublePraise()
    {
        $teamLead = new TeamLead(
            $state = new LeadState('good')
        );

        $manager = new Manager();
        $teamLead->attach($manager);

        $teamLead->leadReaction(JuniorResultGenerator::successResult());

        $this->assertEquals(TeamLead::getPraiseCount(), $manager->getSuccesses());

        $teamLead->leadReaction(JuniorResultGenerator::successResult());

        $this->assertEquals(TeamLead::getPraiseCount(), $manager->getSuccesses());

    }
}
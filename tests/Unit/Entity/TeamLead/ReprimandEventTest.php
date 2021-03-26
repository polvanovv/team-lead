<?php

declare(strict_types=1);


namespace App\Test\Unit\Entity\TeamLead;


use App\Entity\HumanResources\HumanResources;
use App\Entity\TeamLead\Service\JuniorResultGenerator;
use App\Entity\TeamLead\LeadState;
use App\Entity\TeamLead\TeamLead;
use PHPUnit\Framework\TestCase;

class ReprimandEventTest extends TestCase
{
    public function testSuccessDoubleReprimand()
    {
        $teamLead = new TeamLead(
            $state = new LeadState('worst')
        );

        $hr = new HumanResources();
        $teamLead->attach($hr);

        $teamLead->leadReaction(JuniorResultGenerator::failureResult());

        $this->assertEquals(TeamLead::getReprimandCount(), $hr->getFailuresCount());

        $teamLead->leadReaction(JuniorResultGenerator::failureResult());

        $this->assertEquals(TeamLead::getReprimandCount(), $hr->getFailuresCount());
    }

}
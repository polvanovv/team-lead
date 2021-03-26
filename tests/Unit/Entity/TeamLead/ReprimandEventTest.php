<?php

declare(strict_types=1);


namespace App\Test\Unit\Entity\TeamLead;


use App\Entity\TeamLead\Service\JuniorResultGenerator;
use App\Entity\TeamLead\LeadState;
use App\Entity\TeamLead\TeamLead;
use PHPUnit\Framework\TestCase;

class ReprimandEventTest extends TestCase
{
    public function testSuccess()
    {
        $teamLead = new TeamLead(
            $state = new LeadState('worst')
        );

        $teamLead->leadReaction(JuniorResultGenerator::failureResult());

        $this->assertEquals(2, $teamLead->getHr()->getReprimandCount());
        $this->assertEquals( 'You can do better.', $teamLead->getMessage(),);

        $teamLead->leadReaction(JuniorResultGenerator::successResult());
        $this->assertEquals(2, $teamLead->getHr()->getReprimandCount());

    }

}
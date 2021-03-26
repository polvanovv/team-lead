<?php

declare(strict_types=1);


namespace App\Test\Unit\Entity\TeamLead;


use App\Entity\TeamLead\Service\JuniorResultGenerator;
use App\Entity\TeamLead\LeadState;
use App\Entity\TeamLead\TeamLead;
use PHPUnit\Framework\TestCase;

class RaiseEventTest extends TestCase
{
    public function testSuccess()
    {
        $teamLead = new TeamLead(
            $state = new LeadState('good')
        );

        $teamLead->leadReaction(JuniorResultGenerator::successResult());

        $this->assertEquals(TeamLead::getPraiseCount(), $teamLead->getManager()->getPraiseCount());
        $this->assertEquals( 'Keep it up.', $teamLead->getMessage(),);

        $teamLead->leadReaction(JuniorResultGenerator::successResult());
        $this->assertEquals(TeamLead::getPraiseCount(), $teamLead->getManager()->getPraiseCount());

    }
}
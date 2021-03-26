<?php

declare(strict_types=1);


namespace App\Test\Unit\Model\TeamLead\Entity\TeamLead;


use App\Model\TeamLead\Entity\Service\JuniorResultGenerator;
use App\Model\TeamLead\Entity\TeamLead\LeadState;
use App\Model\TeamLead\Entity\TeamLead\TeamLead;
use PHPUnit\Framework\TestCase;

class RaiseEventTest extends TestCase
{
    public function testSuccess()
    {
        $teamLead = new TeamLead(
            $state = new LeadState('good')
        );

        $teamLead->leadReaction(JuniorResultGenerator::successResult());

        $this->assertEquals(2, $teamLead->getManager()->getPraiseCount());
        $this->assertEquals( 'Keep it up.', $teamLead->getMessage(),);

        $teamLead->leadReaction(JuniorResultGenerator::successResult());
        $this->assertEquals(3, $teamLead->getManager()->getPraiseCount());

    }
}
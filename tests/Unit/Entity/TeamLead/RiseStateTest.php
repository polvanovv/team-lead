<?php

declare(strict_types=1);

namespace App\Test\Unit\Entity\TeamLead;

use App\Entity\TeamLead\Service\JuniorResultGenerator;
use App\Entity\TeamLead\LeadState;
use App\Entity\TeamLead\TeamLead;
use PHPUnit\Framework\TestCase;

/**
 * Class RiseStateTest
 *
 * @package App\Test\Unit\Model\TeamLead\Entity\TeamLead
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class RiseStateTest extends TestCase
{

    public function testSuccessRiseFromBadToFine()
    {
        $teamLead = new TeamLead(
            $state = new LeadState('bad')
        );

        $this->assertEquals($state->getName(), $teamLead->getState());

        $teamLead->leadReaction(JuniorResultGenerator::successResult());

        $this->assertEquals('fine', $teamLead->getState());
        $this->assertEquals( 'Keep it up.', $teamLead->getMessage(),);
    }

    public function testSuccessRiseFromFineToGood()
    {
        $teamLead = new TeamLead(
            $state = new LeadState('fine')
        );

        $this->assertEquals($state->getName(), $teamLead->getState());

        $teamLead->leadReaction(JuniorResultGenerator::successResult());

        $this->assertEquals('good', $teamLead->getState());
        $this->assertEquals( 'Keep it up.', $teamLead->getMessage(),);
    }

    public function testSuccessStayOnGood()
    {
        $teamLead = new TeamLead(
            $state = new LeadState('good')
        );

        $this->assertEquals($state->getName(), $teamLead->getState());

        $teamLead->leadReaction(JuniorResultGenerator::successResult());

        $this->assertEquals('good', $teamLead->getState());
        $this->assertEquals( 'Keep it up.', $teamLead->getMessage(),);
    }
}
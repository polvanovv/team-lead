<?php

declare(strict_types=1);

namespace App\Test\Unit\Entity\TeamLead;

use App\Entity\TeamLead\Service\JuniorResultGenerator;
use App\Entity\TeamLead\LeadState;
use App\Entity\TeamLead\TeamLead;
use PHPUnit\Framework\TestCase;


/**
 * Class DownStateTest
 *
 * @package App\Test\Unit\Model\TeamLead\Entity\TeamLead
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class DownStateTest extends TestCase
{

    public function testSuccessDownFromFineToBad()
    {
        $teamLead = new TeamLead(
            $state = new LeadState('fine')
        );

        $this->assertEquals($state->getName(), $teamLead->getState());

        $teamLead->leadReaction(JuniorResultGenerator::failureResult());

        $this->assertEquals('bad', $teamLead->getState());
        $this->assertEquals('You can do better.', $teamLead->getMessage() );
    }

    public function testSuccessDownFromBadToWorst()
    {
        $teamLead = new TeamLead(
            $state = new LeadState('bad')
        );

        $this->assertEquals($state->getName(), $teamLead->getState());

        $teamLead->leadReaction(JuniorResultGenerator::failureResult());

        $this->assertEquals('worst', $teamLead->getState());
        $this->assertEquals('You can do better.', $teamLead->getMessage() );
    }

    public function testSuccessStayOnWorst()
    {
        $teamLead = new TeamLead(
            $state = new LeadState('worst')
        );

        $this->assertEquals($state->getName(), $teamLead->getState());

        $teamLead->leadReaction(JuniorResultGenerator::failureResult());

        $this->assertEquals('worst', $teamLead->getState());
        $this->assertEquals('You can do better.', $teamLead->getMessage() );
    }


}
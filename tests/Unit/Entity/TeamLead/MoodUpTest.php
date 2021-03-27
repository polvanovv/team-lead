<?php

declare(strict_types=1);

namespace App\Test\Unit\Entity\TeamLead;

use App\Entity\TeamLead\Mood\BadMoodState;
use App\Entity\TeamLead\Mood\FineMoodState;
use App\Entity\TeamLead\Mood\GoodMoodState;
use App\Entity\TeamLead\Mood\WorstMoodState;
use App\Service\JuniorResultGenerator;
use App\Entity\TeamLead\Mood\Mood;
use App\Entity\TeamLead\TeamLead;
use PHPUnit\Framework\TestCase;

/**
 * Class RiseStateTest
 *
 * @package App\Test\Unit\Model\TeamLead\Entity\TeamLead
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class MoodUpTest extends TestCase
{

    public function testSuccessMoodUpFromBadToFine()
    {
        $teamLead = new TeamLead(
            $mood = new Mood(new BadMoodState())
        );

        $this->assertEquals($mood->getMoodStateClass(), $teamLead->getMood());

        $teamLead->leadReaction(JuniorResultGenerator::successResult());

        $this->assertEquals( 'Keep it up.', $teamLead->getPhrase(),);
        $this->assertEquals((new FineMoodState()), $teamLead->getMood());
    }

    public function testSuccessMoodUpFromBadToGood()
    {
        $teamLead = new TeamLead(
            $mood = new Mood(new BadMoodState(2, 1))
        );

        $this->assertEquals($mood->getMoodStateClass(), $teamLead->getMood());

        $teamLead->leadReaction(JuniorResultGenerator::successResult());

        $this->assertEquals( 'Keep it up.', $teamLead->getPhrase(),);
        $this->assertEquals((new GoodMoodState()), $teamLead->getMood());
    }

    public function testSuccessMoodUpFromWorstToGood()
    {
        $teamLead = new TeamLead(
            $mood = new Mood(new WorstMoodState(3, 1))
        );

        $this->assertEquals($mood->getMoodStateClass(), $teamLead->getMood());

        $teamLead->leadReaction(JuniorResultGenerator::successResult());

        $this->assertEquals( 'Keep it up.', $teamLead->getPhrase(),);
        $this->assertEquals((new GoodMoodState()), $teamLead->getMood());
    }

}
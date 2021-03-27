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
 * Class DownStateTest
 *
 * @package App\Test\Unit\Model\TeamLead\Entity\TeamLead
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class MoodDownTest extends TestCase
{

    public function testSuccessMoodDownFromBadToWorst()
    {
        $teamLead = new TeamLead(
            $mood = new Mood(new BadMoodState())
        );

        $this->assertEquals($mood->getMoodStateClass(), $teamLead->getMood());

        $teamLead->leadReaction(JuniorResultGenerator::failureResult());

        $this->assertEquals('You can do better.', $teamLead->getPhrase());
        $this->assertEquals((new WorstMoodState()), $teamLead->getMood());
    }

    public function testSuccessMoodDownFromGoodToBad()
    {
        $teamLead = new TeamLead(
            $mood = new Mood(new GoodMoodState(1, 2))
        );

        $this->assertEquals($mood->getMoodStateClass(), $teamLead->getMood());

        $teamLead->leadReaction(JuniorResultGenerator::failureResult());

        $this->assertEquals('You can do better.', $teamLead->getPhrase());
        $this->assertEquals((new BadMoodState()), $teamLead->getMood());
    }

    public function testSuccessMoodDownFromGoodToWorst()
    {
        $teamLead = new TeamLead(
            $mood = new Mood(new GoodMoodState(1, 3))
        );

        $this->assertEquals($mood->getMoodStateClass(), $teamLead->getMood());

        $teamLead->leadReaction(JuniorResultGenerator::failureResult());

        $this->assertEquals('You can do better.', $teamLead->getPhrase());
        $this->assertEquals((new WorstMoodState()), $teamLead->getMood());
    }
}
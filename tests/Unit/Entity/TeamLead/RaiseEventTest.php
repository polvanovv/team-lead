<?php

declare(strict_types=1);


namespace App\Test\Unit\Entity\TeamLead;


use App\Entity\Observer\Manager;
use App\Entity\TeamLead\Mood\GoodMoodState;
use App\Service\JuniorResultGenerator;
use App\Entity\TeamLead\Mood\Mood;
use App\Entity\TeamLead\TeamLead;
use PHPUnit\Framework\TestCase;

class RaiseEventTest extends TestCase
{
    public function testSuccessDoublePraise()
    {
        $teamLead = new TeamLead(
            $mood = new Mood(new GoodMoodState())
        );

        $manager = new Manager();
        $teamLead->attach($manager);

        $teamLead->leadReaction(JuniorResultGenerator::successResult());
        $this->assertEquals(1, $manager->getWorkResults());

        $teamLead->leadReaction(JuniorResultGenerator::successResult());
        $this->assertEquals(2, $manager->getWorkResults());

    }
}
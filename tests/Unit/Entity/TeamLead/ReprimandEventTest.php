<?php

declare(strict_types=1);


namespace App\Test\Unit\Entity\TeamLead;


use App\Entity\Observer\HumanResources;
use App\Entity\TeamLead\Mood\WorstMoodState;
use App\Service\JuniorResultGenerator;
use App\Entity\TeamLead\Mood\Mood;
use App\Entity\TeamLead\TeamLead;
use PHPUnit\Framework\TestCase;

class ReprimandEventTest extends TestCase
{
    public function testSuccessDoubleReprimand()
    {
        $teamLead = new TeamLead(
            $state = new Mood(new WorstMoodState())
        );

        $hr = new HumanResources();
        $teamLead->attach($hr);

        $workResults = $hr->getWorkResults();

        $teamLead->leadReaction(JuniorResultGenerator::failureResult());
        $this->assertEquals( $workResults + 1, $hr->getWorkResults());

        $teamLead->leadReaction(JuniorResultGenerator::failureResult());
        $this->assertEquals($workResults + 2, $hr->getWorkResults());
    }

}
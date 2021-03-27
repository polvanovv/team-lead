<?php

declare(strict_types=1);


namespace App\Entity\Observer;


abstract class AbstractObserver implements \SplObserver
{

    abstract public function update(\SplSubject $subject);

    abstract public function getWorkResults(): int;
}
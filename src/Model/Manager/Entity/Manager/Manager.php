<?php

declare(strict_types=1);


namespace App\Model\Manager\Entity\Manager;


use App\Model\SubscriberInterface;

class Manager implements SubscriberInterface
{
    /**
     * @var int
     */
    private int $praiseCount;

    /**
     * @param $data
     *
     * @return mixed|void
     */
    public function update($data)
    {
        $this->praiseCount = $data;
    }

    /**
     * @return int
     */
    public function getPraiseCount(): int
    {
        return $this->praiseCount;
    }
}
<?php

declare(strict_types=1);


namespace App\Entity\Manager;


use App\Entity\SubscriberInterface;

/**
 * Class Manager
 *
 * @package App\Entity\Manager
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
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
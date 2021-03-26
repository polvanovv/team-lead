<?php

declare(strict_types=1);


namespace App\Model\HumanResources\Entity\HumanResources;


use App\Model\SubscriberInterface;

/**
 * Class HumanResources
 *
 * @package App\Model\HumanResources\Entity\HumanResources
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class HumanResources implements SubscriberInterface
{

    /**
     * @var int
     */
    private int $reprimandCount;

    /**
     * @param $data
     *
     * @return mixed|void
     */
    public function update($data)
    {
        $this->reprimandCount = $data;
    }

    /**
     * @return int
     */
    public function getReprimandCount(): int
    {
        return $this->reprimandCount;
    }
}
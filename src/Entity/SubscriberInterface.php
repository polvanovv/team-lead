<?php

declare(strict_types=1);


namespace App\Entity;

/**
 * Interface SubscriberInterface
 *
 * @package App\Entity
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
interface SubscriberInterface
{
    /**
     * @param $data
     *
     * @return mixed
     */
    public function update($data);
}
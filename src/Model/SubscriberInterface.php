<?php

declare(strict_types=1);


namespace App\Model;

/**
 * Interface SubscriberInterface
 *
 * @package App\Model\Interfaces
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
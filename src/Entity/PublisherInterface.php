<?php

declare(strict_types=1);

namespace App\Entity;

/**
 * Interface PublisherInterface
 *
 * @package App\Entity
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
interface PublisherInterface
{
    /**
     * @param $data
     *
     * @return mixed
     */
    public function publish($data);
}
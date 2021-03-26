<?php

declare(strict_types=1);

namespace App\Model;

/**
 * Interface PublisherInterface
 *
 * @package App\Model\Interfaces
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
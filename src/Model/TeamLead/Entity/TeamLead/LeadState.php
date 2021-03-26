<?php

declare(strict_types=1);


namespace App\Model\TeamLead\Entity\TeamLead;

use Webmozart\Assert\Assert;

/**
 * Class LeadState
 *
 * @package App\Model\TeamLead\Entity\TeamLead
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class LeadState
{
    public const STEP_CHANGE_STATE = 1;

    public const STATES = [
        'worst',
        'bad',
        'fine',
        'good',
    ];

    /**
     * @var string
     */
    private string $name;

    /**
     * LeadState constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        Assert::oneOf($name, self::STATES);

        $this->name = $name;
    }

    /**
     * @return $this|LeadState
     */
    public function stepUpState(): LeadState
    {
        if ($this->getName() == 'good') {
            return $this;
        }

        return new self(
            self::STATES [
            (array_search($this->getName(), self::STATES)) + self::STEP_CHANGE_STATE
            ]
        );
    }

    /**
     * @return $this|LeadState
     */
    public function stepDownState(): LeadState
    {
        if ($this->getName() == 'worst') {
            return $this;
        }

        return new self(
            self::STATES[
                (array_search($this->getName(), self::STATES)) - self::STEP_CHANGE_STATE
            ]);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isTimeToPraise(): bool
    {
        return $this->name == self::STATES[array_key_last(self::STATES)];
    }

    /**
     * @return bool
     */
    public function isTimeToReprimand(): bool
    {
        return $this->name == self::STATES[array_key_first(self::STATES)];
    }
}
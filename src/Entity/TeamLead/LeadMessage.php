<?php

declare(strict_types=1);


namespace App\Entity\TeamLead;


use Webmozart\Assert\Assert;

/**
 * Class LeadMessage
 *
 * @package App\Entity\TeamLead
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class LeadMessage
{
    public const SUCCESS_MESSAGE = 'Keep it up.';
    public const FAILURE_MESSAGE = 'You can do better.';

    /**
     * @var string
     */
    private string $text;

    /**
     * LeadMessage constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        Assert::oneOf($message, [
            self::SUCCESS_MESSAGE,
            self::FAILURE_MESSAGE
        ]);

        $this->text = $message;
    }

    /**
     * @return static
     */
    public static function success(): self
    {
        return new self(self::SUCCESS_MESSAGE);
    }

    /**
     * @return static
     */
    public static function failure():self
    {
        return new self(self::FAILURE_MESSAGE);
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}
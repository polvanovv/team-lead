<?php

declare(strict_types=1);


namespace App\Service;


use Webmozart\Assert\Assert;

/**
 * Class PhraseGenerator
 *
 * @package App\Service
 * @author Polvanov Igor <polvanovv@gmail.com>
 */
class PhraseGenerator
{
    public const SUCCESS_MESSAGE = 'Keep it up.';
    public const FAILURE_MESSAGE = 'You can do better.';

    /**
     * Phrase text
     *
     * @var string
     */
    private  $text;

    /**
     * LeadMessage constructor.
     *
     * @param string $phrase
     */
    public function __construct(string $phrase)
    {
        Assert::oneOf($phrase, [
            self::SUCCESS_MESSAGE,
            self::FAILURE_MESSAGE
        ]);

        $this->text = $phrase;
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
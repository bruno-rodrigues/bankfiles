<?php
declare(strict_types=1);

namespace EoneoPay\BankFiles\Parsers;

abstract class BaseParser
{
    /**
     * @var string
     */
    protected $contents;

    /**
     * BaseParser constructor.
     */
    public function __construct(string $contents)
    {
        $this->contents = $contents;
    }

    /**
     * Process parsing
     */
    abstract protected function process(): void;
}

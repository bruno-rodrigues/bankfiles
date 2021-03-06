<?php
declare(strict_types=1);

namespace Tests\EoneoPay\BankFiles\Parsers\DirectEntry\Results;

use EoneoPay\BankFiles\Parsers\DirectEntry\Results\Header;
use EoneoPay\Utils\DateTime;
use Tests\EoneoPay\BankFiles\Parsers\TestCase;

/**
 * @covers \EoneoPay\BankFiles\Parsers\DirectEntry\Results\Header
 */
class HeaderTest extends TestCase
{
    /**
     * Test if date conversion works as expected
     *
     * @throws \EoneoPay\Utils\Exceptions\InvalidDateTimeStringException
     */
    public function testDateConversion(): void
    {
        $header = new Header([
            'dateProcessed' => '070904',
        ]);

        $expectedDateTime = new DateTime('2004-09-07');

        self::assertEquals($expectedDateTime, $header->getDateProcessed());
    }

    /**
     * Test if invalid date returns null
     *
     * @throws \EoneoPay\Utils\Exceptions\InvalidDateTimeStringException
     */
    public function testInvalidDateReturnsNullOnConversion(): void
    {
        $header = new Header([
            'dateProcessed' => '',
        ]);

        self::assertNull($header->getDateProcessed());
    }
}

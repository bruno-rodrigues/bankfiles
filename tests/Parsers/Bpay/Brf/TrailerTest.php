<?php
declare(strict_types=1);

namespace Tests\EoneoPay\BankFiles\Parsers\Bpay\Brf;

use EoneoPay\BankFiles\Parsers\Bpay\Brf\Exceptions\InvalidSignFieldException;
use EoneoPay\BankFiles\Parsers\Bpay\Brf\Results\Trailer;
use Tests\EoneoPay\BankFiles\Parsers\TestCase;

class TrailerTest extends TestCase
{
    /**
     * Should return amount of error corrections
     *
     * @group \EoneoPay\BankFiles\Parsers\Bpay\Brf\Results\Trailer
     *
     * @return void
     *
     * @throws \EoneoPay\BankFiles\Parsers\Bpay\Brf\Exceptions\InvalidSignFieldException
     */
    public function testShouldReturnAmountOfErrorCorrections(): void
    {
        $expected = [
            'amount' => '20.00',
            'type' => 'credit'
        ];

        $trailer = new Trailer([
            'amountOfErrorCorrections' => '00000000000200{'
        ]);

        self::assertIsArray($trailer->getAmountOfErrorCorrections());
        self::assertSame($expected, $trailer->getAmountOfErrorCorrections());
    }

    /**
     * Should return amount of payments
     *
     * @group \EoneoPay\BankFiles\Parsers\Bpay\Brf\Results\Trailer
     *
     * @return void
     *
     * @throws \EoneoPay\BankFiles\Parsers\Bpay\Brf\Exceptions\InvalidSignFieldException
     */
    public function testShouldReturnAmountOfPayments(): void
    {
        $expected = [
            'amount' => '120.15',
            'type' => 'credit'
        ];

        $trailer = new Trailer([
            'amountOfPayments' => '00000000001201E'
        ]);

        self::assertIsArray($trailer->getAmountOfPayments());
        self::assertSame($expected, $trailer->getAmountOfPayments());
    }

    /**
     * Should return amount of payments
     *
     * @group \EoneoPay\BankFiles\Parsers\Bpay\Brf\Results\Trailer
     *
     * @return void
     *
     * @throws \EoneoPay\BankFiles\Parsers\Bpay\Brf\Exceptions\InvalidSignFieldException
     */
    public function testShouldReturnAmountOfReversals(): void
    {
        $expected = [
            'amount' => '125.17',
            'type' => 'credit'
        ];

        $trailer = new Trailer([
            'amountOfReversals' => '00000000001251G'
        ]);

        self::assertIsArray($trailer->getAmountOfReversals());
        self::assertSame($expected, $trailer->getAmountOfReversals());
    }

    /**
     * Should return number of payments
     *
     * @return void
     *
     * @throws \EoneoPay\BankFiles\Parsers\Bpay\Brf\Exceptions\InvalidSignFieldException
     */
    public function testShouldReturnNumberOfPayments(): void
    {
        $expected = [
            'amount' => 34,
            'type' => 'credit'
        ];

        $trailer = new Trailer([
            'numberOfPayments' => '00000003D'
        ]);

        self::assertCount(2, $trailer->getNumberOfPayments());
        self::assertSame($expected, $trailer->getNumberOfPayments());
    }

    /**
     * Should return number of error corrections
     *
     * @return void
     *
     * @throws \EoneoPay\BankFiles\Parsers\Bpay\Brf\Exceptions\InvalidSignFieldException
     */
    public function testShouldReturnNumberOfErrorCorrections(): void
    {
        $expected = [
            'amount' => 10,
            'type' => 'credit'
        ];

        $trailer = new Trailer([
            'numberOfErrorCorrections' => '00000001{'
        ]);

        self::assertCount(2, $trailer->getNumberOfErrorCorrections());
        self::assertSame($expected, $trailer->getNumberOfErrorCorrections());
    }

    /**
     * Should return number of reversals
     *
     * @return void
     *
     * @throws \EoneoPay\BankFiles\Parsers\Bpay\Brf\Exceptions\InvalidSignFieldException
     */
    public function testShouldReturnNumberOfReversals(): void
    {
        $expected = [
            'amount' => 20,
            'type' => 'credit'
        ];

        $trailer = new Trailer([
            'numberOfReversals' => '00000002{'
        ]);

        self::assertCount(2, $trailer->getNumberOfReversals());
        self::assertSame($expected, $trailer->getNumberOfReversals());
    }

    /**
     * Should return settlement amount
     *
     * @group \EoneoPay\BankFiles\Parsers\Bpay\Brf\Results\Trailer
     *
     * @return void
     *
     * @throws \EoneoPay\BankFiles\Parsers\Bpay\Brf\Exceptions\InvalidSignFieldException
     */
    public function testShouldReturnSettlementAmount(): void
    {
        $expected = [
            'amount' => '125.17',
            'type' => 'credit'
        ];

        $trailer = new Trailer([
            'settlementAmount' => '00000000001251G'
        ]);

        self::assertCount(2, $trailer->getSettlementAmount());
        self::assertSame($expected, $trailer->getSettlementAmount());
    }

    /**
     * Should throw exception if sign field is not found
     *
     * @group \EoneoPay\BankFiles\Parsers\Bpay\Brf\Results\Trailer
     *
     * @return void
     */
    public function testShouldThrowExceptionIfSignedFileNotFound(): void
    {
        $this->expectException(InvalidSignFieldException::class);

        $trailer = new Trailer([
            'amountOfErrorCorrections' => '00000000000200W'
        ]);

        $trailer->getAmountOfErrorCorrections();
    }
}

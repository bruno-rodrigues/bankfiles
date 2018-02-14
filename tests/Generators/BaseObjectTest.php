<?php
declare(strict_types=1);

namespace Tests\EoneoPay\BankFiles\Generators;

use Tests\EoneoPay\BankFiles\Generators\Stubs\StubObject;

class BaseObjectTest extends TestCase
{
    /**
     * Should return all attributes
     *
     * @group Generator-BaseObject
     *
     * @return void
     */
    public function testShouldReturnAttributes(): void
    {
        $data = [
            'accountName' => 'John Doe',
            'accountNumber' => '11-222-33'
        ];

        $object = new StubObject($data);

        self::assertInternalType('array', $object->getAttributes());
        self::assertEquals($data, $object->getAttributes());
    }
}
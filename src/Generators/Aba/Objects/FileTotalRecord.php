<?php
declare(strict_types=1);

namespace EoneoPay\BankFiles\Generators\Aba\Objects;

use EoneoPay\BankFiles\Generators\BaseObject;
use EoneoPay\BankFiles\Generators\Interfaces\GeneratorInterface;

/**
 * @method string getBlank1()
 * @method string getBlank2()
 * @method string getBlank3()
 * @method string getBsbFiller()
 * @method string getFileUserCountOfRecordsType()
 * @method string getFileUserCreditTotalAmount()
 * @method string getFileUserDebitTotalAmount()
 * @method string getFileUserNetTotalAmount()
 * @method string getRecordType()
 */
class FileTotalRecord extends BaseObject
{
    /**
     * BaseResult constructor.
     *
     * @param mixed[]|null $data
     */
    public function __construct(?array $data = null)
    {
        parent::__construct(\array_merge(['bsbFiller' => '999-999'], $data ?? []));
    }

    /**
     * Get validation rules.
     *
     * @return string[]
     */
    public function getValidationRules(): array
    {
        return [
            'fileUserNetTotalAmount' => GeneratorInterface::VALIDATION_RULE_NUMERIC,
            'fileUserCreditTotalAmount' => GeneratorInterface::VALIDATION_RULE_NUMERIC,
            'fileUserDebitTotalAmount' => GeneratorInterface::VALIDATION_RULE_NUMERIC,
            'fileUserCountOfRecordsType' => GeneratorInterface::VALIDATION_RULE_NUMERIC,
        ];
    }

    /**
     * Get attributes padding configuration as [<attribute> => [<length>, <string>, <type>]].
     *
     * @see http://php.net/manual/en/function.str-pad.php
     *
     * @return mixed[]
     */
    protected function getAttributesPaddingRules(): array
    {
        return [
            'blank1' => [12],
            'blank2' => [24],
            'blank3' => [40],
            'fileUserCountOfRecordsType' => [6, '0', \STR_PAD_LEFT],
            'fileUserNetTotalAmount' => [10, '0', \STR_PAD_LEFT],
            'fileUserCreditTotalAmount' => [10, '0', \STR_PAD_LEFT],
            'fileUserDebitTotalAmount' => [10, '0', \STR_PAD_LEFT],
        ];
    }

    /**
     * Return object attributes.
     *
     * @return string[]
     */
    protected function initAttributes(): array
    {
        return [
            'recordType',
            'bsbFiller',
            'blank1',
            'fileUserNetTotalAmount',
            'fileUserCreditTotalAmount',
            'fileUserDebitTotalAmount',
            'blank2',
            'fileUserCountOfRecordsType',
            'blank3',
        ];
    }

    /**
     * Return record type.
     */
    protected function initRecordType(): string
    {
        return '7';
    }
}

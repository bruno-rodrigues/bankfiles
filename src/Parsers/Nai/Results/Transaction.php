<?php
declare(strict_types=1);

namespace EoneoPay\BankFiles\Parsers\Nai\Results;

use EoneoPay\BankFiles\Parsers\Nai\Results\Transactions\Details;

/**
 * @method string getAmount()
 * @method string getCode()
 * @method string getFundsType()
 * @method string getReferenceNumber()
 * @method string getText()
 * @method string getTransactionCode()
 * @method Details getTransactionDetails()
 */
class Transaction extends AbstractNaiResult
{
    /**
     * Get account.
     *
     * @return \EoneoPay\BankFiles\Parsers\Nai\Results\Account|null
     */
    public function getAccount(): ?Account
    {
        return $this->context->getAccount($this->data['account']);
    }

    /**
     * Return object attributes.
     *
     * @return string[]
     */
    protected function initAttributes(): array
    {
        return [
            'account',
            'amount',
            'code',
            'fundsType',
            'referenceNumber',
            'text',
            'transactionCode',
            'transactionDetails'
        ];
    }
}

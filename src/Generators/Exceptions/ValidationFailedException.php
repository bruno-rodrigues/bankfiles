<?php
declare(strict_types=1);

namespace EoneoPay\BankFiles\Generators\Exceptions;

use EoneoPay\Utils\Exceptions\ValidationException;
use Throwable;

class ValidationFailedException extends ValidationException
{
    /**
     * ValidationFailedException constructor.
     *
     * @param mixed[] $errors
     * @param null|string $message
     * @param int|null $code
     * @param null|\Throwable $previous
     */
    public function __construct(array $errors, ?string $message = null, ?int $code = null, ?Throwable $previous = null)
    {
        $message = \sprintf('%s. %s', $message ?? '', $this->getErrorsToString($errors));

        parent::__construct($message, $code, $previous, $errors);
    }

    /**
     * Get Error code.
     *
     * @return int
     */
    public function getErrorCode(): int
    {
        return self::DEFAULT_ERROR_CODE_VALIDATION;
    }

    /**
     * Get Error sub-code.
     *
     * @return int
     */
    public function getErrorSubCode(): int
    {
        return self::DEFAULT_ERROR_SUB_CODE;
    }

    /**
     * Get validation errors as string representation.
     *
     * @param array|null $errors
     *
     * @return string
     */
    public function getErrorsToString(?array $errors = null): string
    {
        $pattern = '[attribute => %s, value => %s, rule => %s]';
        $errorsToString = '';

        foreach ($errors ?? $this->getErrors() as $error) {
            $errorsToString .= \sprintf($pattern, $error['attribute'], $error['value'], $error['rule']);
        }

        return $errorsToString;
    }
}

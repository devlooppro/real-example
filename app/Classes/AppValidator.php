<?php

declare(strict_types=1);

namespace App\Classes;

use Illuminate\Validation\Validator;

/**
 * Class AppValidator
 * @package App\Classes
 */
class AppValidator extends Validator
{
    /**
     * @param string $attribute
     * @param string $value
     * @param array $parameters
     *
     * @return bool
     */
    public function validatePhone(string $attribute, string $value, array $parameters): bool
    {
        if (empty($value)) {
            return true;
        }

        //start with + country code from 1, and min 6 and max 14 digits phone number
        return (bool)preg_match('/^\+[1-9]{1}[0-9]{6,14}$/', $value);
    }

    /**
     * @param string $attribute
     * @param string $value
     * @param array $parameters
     *
     * @return bool
     */
    public function validateUserPasswordRegex(string $attribute, string $value, array $parameters): bool
    {
        if (empty($value)) {
            return true;
        }

        return (bool)preg_match('/^.*(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d\x]).*$/', $value);
    }
}

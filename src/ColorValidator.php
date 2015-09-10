<?php namespace Russoedu\ColorValidator;

use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Validation\Validator;
use Symfony\Component\Translation\TranslatorInterface;

class ColorValidator extends Validator implements ValidatorContract
{
    /**
     * Creates a new instance of Imagevalidator
     */
    public function __construct(TranslatorInterface $translator, array $data, array $rules, array $messages = [], array $customAttributes = [])
    {
        parent::__construct($translator, $data, $rules, $messages, $customAttributes);
    }

    /**
     * Validate an hexadecimal color
     *
     * @param $attribute
     * @param $value
     *
     * @return int
     */
    public function validateHexColor($attribute, $value)
    {
        return preg_match('/^#[a-fA-F0-9]{6}$/u', $value);
    }
}

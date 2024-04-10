<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Image64RequestRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $type = explode('/', explode(':', substr($value, 0, strpos($value, ';')))[1])[1];
        if (!in_array($type, ['jpeg','png'])) {
            $fail('error not a jpeg or png');
        }
    }
}

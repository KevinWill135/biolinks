<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckHandler implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        if (!preg_match('/^@[a-zA-Z0-9_-]+$/', $value)) {
            $fail('Precisa iniciar com @ e conter apenas letras, - e _');
        }

        // if (!str_starts_with($value, '@')) {
        //     $fail('Precisa começar com @');
        // }

        // if (str_contains($value, ' ')) {
        //     $fail('Não pode conte espaços');
        // }
    }
}

<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoBannedWords implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $bannedWords = ['spam', 'hack', 'fake'];

        foreach ($bannedWords as $word) {
            
            if (stripos($value, $word) !== false) {
                
                $fail("The {$attribute} contains an inappropriate word: {$word}.");
            }
        }
    }
}
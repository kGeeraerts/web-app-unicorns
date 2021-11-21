<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;
use \Illuminate\Validation\Rules\Password as Password2;

trait PasswordValidationRules {
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules() {
        return [
            'required',
            'string',
            (new Password)->requireNumeric()->requireSpecialCharacter()->requireUppercase(),
            Password2::min(8)->uncompromised(300),
            'confirmed'
        ];
    }
}

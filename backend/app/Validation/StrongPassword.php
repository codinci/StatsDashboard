<?php

namespace App\Validation;

use CodeIgniter\Validation\Rules;

class StrongPassword extends Rules
{
    public function checkPassword(string $value): bool
    {
        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!])[A-Za-z\d@#$%^&+=!]{8,}$/';
        return (bool) preg_match($regex, $value);
    }
}

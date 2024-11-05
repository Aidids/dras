<?php

namespace App\Enums;

enum AccountType: int
{
    case GUEST = 0;
    case STUDENT = 1;
    case LECTURER = 2;
    case STAFF = 3;

    public function label(): string
    {
        return match($this) {
            self::GUEST => 'Guest Account',
            self::STUDENT => 'Student Account',
            self::LECTURER => 'Lecturer Account',
            self::STAFF => 'Staff Account',
        };
    }
}

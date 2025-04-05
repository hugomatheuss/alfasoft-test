<?php

namespace App\Enums;

enum DatabaseErrorCode: string
{
    case UNIQUE_CONSTRAINT_VIOLATION = '23000';
}

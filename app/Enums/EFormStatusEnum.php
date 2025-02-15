<?php

namespace App\Enums;

enum EFormStatusEnum: int
{
    case PRODUCTION = 1;
    case CREATING = 2;
    case INACTIVE = 3;
}

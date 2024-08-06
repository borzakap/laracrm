<?php

namespace App\Enums;

enum LeadStatus: int
{
    case OPEN = 1;
    case WIN = 2;
    case LOSE = 3;
}

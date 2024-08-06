<?php

namespace App\Enums;

enum ActionsType: string
{
    case CALL = 1;
    case REQUEST = 2;
    case NOTE = 3;
    case TASK = 4;
    case EMAIL = 5;
    case EVENT = 6;
}

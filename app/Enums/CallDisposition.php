<?php

namespace App\Enums;

enum CallDisposition: int
{
    case ANSWER = 1;
    case TRANSFER = 2;
    case BUSY = 3;
    case NOANSWER = 4;
    case CANSEL = 5;
}

<?php

namespace App\Enumerat;

enum UserType: string
{
    case Admin = 'A';
    case Doctor = 'D';
    case Patient = 'P';
}

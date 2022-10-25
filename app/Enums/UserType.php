<?php
namespace App\Enums;

enum UserType: string {
    case ADMIN = 'admin';
    case PHARMA = 'pharma';
    case USER = 'user';
}
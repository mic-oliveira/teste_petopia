<?php

namespace App\Enums;

enum SaleStatusEnum: int
{
    case PENDING=1;
    case PAID=2;
    case CANCELED=3;
    case REFUNDED=4;

}

<?php declare(strict_types=1);

namespace DesignPatterns\CreationalPatterns\Builder;

enum TypeCustomer: string
{
    case STANDAR  = 'standar';
    case PREMIUN  = 'premiun';
    case PLATINUM = 'platinum';
    case GOLD     = 'gold';
    
}
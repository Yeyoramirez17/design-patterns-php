<?php

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Command;

class User
{
    function __construct(
        public readonly string $id,
        public readonly string $email,
        public readonly string $password
    ) {}
}

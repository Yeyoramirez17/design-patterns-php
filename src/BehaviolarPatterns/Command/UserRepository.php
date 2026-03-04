<?php

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Command;

/**
 * Class Receiver - Persistencia de dados
 */
class UserRepository
{
    public function save(User $user): User
    {
        echo "💾 User {$user->email} saved... " . PHP_EOL;
        return $user;
    }
}

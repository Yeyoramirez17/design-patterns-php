<?php

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Command;

/**
 * Class Invoker
 */
class UserController
{
    public function __construct(
        private UserService $service
    ) {}

    public function registerUser(User $user): int
    {
        $command = new RegisterUserCommand($this->service, $user);
        $command->execute();

        return 1;
    }
}

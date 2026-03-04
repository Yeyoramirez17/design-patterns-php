<?php

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Command;

use Override;

/**
 * Command implementation
 */
class RegisterUserCommand implements Command
{
    private UserService $userService;
    private User $user;


    public function __construct(UserService $service, User $user)
    {
        $this->userService = $service;
        $this->user = $user;
    }

    #[Override]
    public function execute(): void
    {
        echo "🚀 command execute... " . PHP_EOL;
        $this->userService->registerUser($this->user);
    }
}

<?php

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Command;

class UserService
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function registerUser(User $user): void
    {
        echo "📏 Some business rules  and validations" . PHP_EOL;
        $this->repository->save($user);
    }
}

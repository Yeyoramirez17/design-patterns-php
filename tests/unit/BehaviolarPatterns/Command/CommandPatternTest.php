<?php

declare(strict_types=1);

use DesignPatterns\BehaviolarPatterns\Command\RegisterUserCommand;
use DesignPatterns\BehaviolarPatterns\Command\User;
use DesignPatterns\BehaviolarPatterns\Command\UserController;
use DesignPatterns\BehaviolarPatterns\Command\UserRepository;
use DesignPatterns\BehaviolarPatterns\Command\UserService;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

final class CommandPatternTest extends TestCase
{
    #[Test]
    #[TestDox("Can register user")]
    public function can_register_user(): void
    {
        $repository = new UserRepository();
        $service = new UserService($repository);
        $controller = new UserController($service);

        $result = $controller->registerUser(new User("1", "jhon@doe.com", "password"));

        $this->assertEquals(1, $result);
    }
}

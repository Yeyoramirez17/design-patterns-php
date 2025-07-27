<?php declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Strategy;

interface IOauthProvider
{

  /**
   * Perform the authentication process.
   * @return void
   */
  public function authenticate(): void;


  /**
   * Retrieves authenticated user information.
   * 
   * @return array
   */
  public function getUserAuthenticated(): array;

  /**
   * Checks if the user is authenticated.
   * 
   * @return bool
   */
  public function isAuthorized(): bool;
}

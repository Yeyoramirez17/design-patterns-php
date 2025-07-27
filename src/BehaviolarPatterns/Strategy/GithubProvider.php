<?php 
declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Strategy;

use DesignPatterns\BehaviolarPatterns\Strategy\IOauthProvider;

final class GithubProvider implements IOauthProvider
{
    /**
     * @var array{access_token: string, scope: string, token_type: string}
     */
    private array $userAuthenticated;

    /**
     * Credentials to log in with Github.
     * 
     * @param array{clientId: string, clientSecret: string, redirectUri: string} $credentials
     */
    public function __construct(private array $credentials) {}

    /**
     * @inheritDoc with Github.
     * @return void
     */
    public function authenticate(): void
    {
        // Feching access token from Github.
        // ...

        $this->userAuthenticated = [
            'access_token'  => 'gho_16C7e42F292c6912E7710c838347Ae178B4a',
            'scope'         => 'gist,repo',
            'token_type'    => 'Bearer',
        ];
    }

    /**
     * @inheritDoc
     * @return array{access_token: string, scope: string, token_type: string}
     */
    public function getUserAuthenticated(): array
    {
        return $this->userAuthenticated;
    }

    /**
     * @inheritDoc
     * @return bool
     */
    public function isAuthorized(): bool
    {
        return isset($this->userAuthenticated["access_token"]) && !empty($this->userAuthenticated["access_token"]);
    }
}
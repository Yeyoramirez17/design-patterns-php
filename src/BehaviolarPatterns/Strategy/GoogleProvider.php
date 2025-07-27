<?php

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Strategy;

final class GoogleProvider implements IOauthProvider
{
    private array $credentials;

    /**
     * Info User
     * @var array{access_token: string, expiration: int, user: array{email: string, name: string, picture: string}} A data response from Google API.
     */
    private array $userData;

    /**
     * Credentials to log in with Google.
     * 
     * @param array{client_id: string, client_secret: string, api_key: string} $credentials
     */
    
    public function __construct(array $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @inheritDoc
     * @return void
     */
    public function authenticate(): void
    {
        // feching access token from Google API
        // ...

        $this->userData = [
            'access_token' => 'ee977806d7286510da8b9a7492ba58e2484c0ecc',
            'expiration'   => time() + 3600,
            'user'         => [
                'email'   => 'jhon@doe.com',
                'name'    => 'Jhon Doe',
                'picture' => 'https://example.com/jhon_doe.jpg'
            ]
        ];
    }

    /**
     * @inheritDoc
     * @return array{access_token: string, expiration: int, user: array{email: string, name: string, picture: string}}
     */
    public function getUserAuthenticated(): array
    {
        return $this->userData;
    }

    /**
     * @inheritDoc
     * @return bool
     */
    public function isAuthorized(): bool
    {
        return isset($this->userData["access_token"]) && !empty($this->userData["access_token"]);
    }


}
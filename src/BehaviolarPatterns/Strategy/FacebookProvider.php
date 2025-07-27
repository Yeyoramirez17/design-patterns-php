<?php 

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Strategy;

final class FacebookProvider implements IOauthProvider
{
    /**
     * Info User
     * @var array{facebook_access_token: string, facebook_id: string, user: array{email: string, fullname: string, picture: string}} A data response from Facebook.
     */
    private array $userAuthenticated;

    private array $credentials;


    /**
     * Credentials to log in to Facebook.
     * 
     * @param array{api_id: string, app_secret: string} $credentials
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
        // feching access token from Fcebook API
        // ...

        $this->userAuthenticated = [
            'facebook_id'           => '',
            'facebook_access_token' => 'cbe648909034c0624c205fe219d3fbd10052c715',
            'user' => [
                'email'    => 'jhon@doe.com',
                'fullname' => 'Jhon Doe',
                'picture'  => 'https://facebook.com/jhon_doe.jpg',
            ]
        ];
    }

    /**
     * @inheritDoc
     * @return array{facebook_access_token: string, facebook_id: string, user: array{email: string, fullname: string, picture: string}} A data response from Facebook.
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
        return isset($this->userAuthenticated["facebook_access_token"]) && !empty($this->userAuthenticated["facebook_access_token"]);
    }
}

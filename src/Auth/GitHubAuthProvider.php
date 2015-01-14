<?php

namespace WpPusher\Updater\Auth;

class GitHubAuthProvider implements AuthProvider
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function register()
    {
        add_filter('http_request_args', array($this, 'gitHubTokenAuth'), 10, 2);
    }

    // Probably won't work in 5.3, though.
    public function gitHubTokenAuth($args, $url)
    {
        if ( ! strstr($url, 'https://github.com/'))
            return $args;

        $args['headers']['Authorization'] = 'token ' . $this->token;

        return $args;
    }
}

<?php

namespace WpPusher\Updater\Auth;

class BitbucketAuthProvider implements AuthProvider
{
    protected $user;
    protected $pass;

    public function __construct($user, $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }

    public function register()
    {
        add_filter('http_request_args', array($this, 'bitbucketBasicAuth'), 10, 2);
    }

    // Probably won't work in 5.3, though.
    public function bitbucketBasicAuth($args, $url)
    {
        if ( ! strstr($url, 'https://bitbucket.org/'))
            return $args;

        $args['headers']['Authorization'] = 'Basic ' . base64_encode("{$this->user}:{$this->pass}");

        return $args;
    }
}

<?php

namespace WpPusher\Updater;

use WpPusher\Updater\Auth\AuthProvider;
use WpPusher\Updater\Updates\UpdatesProvider;

abstract class PackageUpdater
{
    protected $authProvider;
    protected $updatesProvider;

    public function config(array $options)
    {

        $this->setAuthProvider($options['auth_provider']);
        $this->setUpdatesProvider($options['updates_provider']);
        $this->updatesProvider->setZipballUrl($options['zipball_url']);
    }

    abstract function enable();

    public function setAuthProvider(AuthProvider $provider)
    {
        $this->authProvider = $provider;
    }

    public function setUpdatesProvider(UpdatesProvider $provider)
    {
        $this->updatesProvider = $provider;
    }
}

<?php

namespace WpPusher\Updater;

use WpPusher\Updater\Auth\AuthProvider;

abstract class PackageUpdater
{
    protected $zipballUrl;
    protected $authProvider;

    public function config(array $options)
    {
        $this->setZipballUrl($options['zipball_url']);
        $this->setAuthProvider($options['auth_provider']);

        if ($this instanceof PluginUpdater)
            $this->pluginFile = $options['plugin_file'];

        if ($this instanceof ThemeUpdater)
            $this->stylesheet = $options['stylesheet'];
    }

    public function enable()
    {
        if ($authProvider)
            $authProvider->register();

        // Do updater stuff
    }

    public function setAuthProvider(AuthProvider $provider)
    {
        $this->authProvider = $provider;
    }

    public function setZipballUrl($url)
    {
        $this->zipballUrl = $url;
    }
}

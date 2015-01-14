<?php

namespace WpPusher\Updater;

use WpPusher\Updater\Auth\AuthProvider;
use WpPusher\Updater\Updates\UpdatesProvider;

abstract class PackageUpdater
{
    protected $authProvider;
    protected $pluginFile;
    protected $stylesheet;
    protected $updatesProvider;
    protected $zipballUrl;

    public function config(array $options)
    {

        $this->setAuthProvider($options['auth_provider']);
        $this->setUpdatesProvider($options['updates_provider']);
        $this->setZipballUrl($options['zipball_url']);

        if ($this instanceof PluginUpdater)
            $this->setPluginFile($options['plugin_file']);

        if ($this instanceof ThemeUpdater)
            $this->setStylesheet($options['stylesheet']);
    }

    public function enable()
    {
        if ($authProvider)
            $authProvider->register();

        // Do updater stuff
        add_filter('pre_set_site_transient_update_plugins', array($this->updatesProvider, 'setUpdateTransient'));
    }

    public function setAuthProvider(AuthProvider $provider)
    {
        $this->authProvider = $provider;
    }

    public function setPluginFile($pluginFile)
    {
        $this->pluginFile = $pluginFile;
    }

    public function setStylesheet($stylesheet)
    {
        $this->stylesheet = $stylesheet;
    }

    public function setUpdatesProvider(UpdatesProvider $provider)
    {
        $this->updatesProvider = $provider;
    }

    public function setZipballUrl($url)
    {
        $this->zipballUrl = $url;
    }
}

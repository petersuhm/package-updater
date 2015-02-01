<?php

namespace WpPusher\Updater;

class PluginUpdater extends PackageUpdater
{
    public function enable()
    {
        if ($this->authProvider)
            $this->authProvider->register();

        add_filter('pre_set_site_transient_update_plugins', array($this->updatesProvider, 'setUpdateTransientPlugin'), 10, 1);
    }
}

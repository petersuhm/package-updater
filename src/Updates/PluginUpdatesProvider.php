<?php

namespace WpPusher\Updater\Updates;

interface PluginUpdatesProvider extends UpdatesProvider
{
    public function setUpdateTransientPlugin($transient);
}

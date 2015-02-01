<?php

namespace WpPusher\Updater\Updates;

class GitHubUpdatesProvider implements PluginUpdatesProvider
{
    protected $plugin;
    protected $zipballUrl;

    public function setUpdateTransientPlugin($transient)
    {
        if(empty($transient->checked))
            return $transient;

        $transientResponse = new \stdClass;
        $transientResponse->package = $this->zipballUrl;
        $transientResponse->slug = dirname(plugin_basename($this->plugin));
        $transientResponse->new_version = '';
        $transientResponse->url = '';

        $transient->response[plugin_basename($this->plugin)] = $transientResponse;

        return $transient;
    }

    public function setPlugin($plugin)
    {
        $this->plugin = $plugin;
    }

    public function setZipballUrl($url)
    {
        $this->zipballUrl = $url;
    }
}

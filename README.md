# WordPress Package Updater

Distribute WordPress packages (themes and plugins) outside of the .org repository.

## Installation

Install the package by adding it to your `composer.json` file.

_Coming soon_

## Usage in your (self distributing) packages

```php
use WpPusher\Updater\Auth\GitHubAuthProvider;
use WpPusher\Updater\PackageUpdater;

$updater = new PackageUpdater;
$updater->config(array(
    'zipball_url' => 'https://api.github.com/repos/petersuhm/hello-user-wordpress-plugin/zipball/master',
    'auth_provider' => new GitHubAuthProvider($accessToken)
));
$updater->enable();
```

## Credits

This package is inspired by @bfintal's [article](http://code.tutsplus.com/tutorials/distributing-your-plugins-in-github-with-automatic-updates--wp-34817) on Tuts+.

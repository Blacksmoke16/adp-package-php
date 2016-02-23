<?php

namespace adpmarketplace\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class MarketplacePlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new MarketplaceInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}

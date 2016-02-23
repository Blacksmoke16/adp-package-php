<?php

namespace adpmarketplace\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class MarketplaceInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 19);
        if ('adpmarketplace/api-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install api module, marketplace api modules '
                .'should always start their package name with '
                .'"adpmarketplace/api-"'
            );
        }

        return 'adplib/'.substr($package->getPrettyName(), 19);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'adpmarketplace-apimodule' === $packageType;
    }
}

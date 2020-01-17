<?php

namespace DotFiles;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class DotFilesInstallerPlugin implements PluginInterface
{
	public function activate(Composer $composer, IOInterface $io)
	{
		$installer = new DotFilesInstaller($io, $composer);
		$composer->getInstallationManager()->addInstaller($installer);
	}
}

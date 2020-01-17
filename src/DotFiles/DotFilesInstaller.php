<?php

namespace DotFiles;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Repository\InstalledRepositoryInterface;

class DotFilesInstaller extends LibraryInstaller {
	public function install( InstalledRepositoryInterface $repo, PackageInterface $package ) {
		parent::install( $repo, $package );
		$this->copy_files( $package );
	}

	private function copy_files( PackageInterface $package ) {
		$extra = $this->composer->getPackage()->getExtra();
		if ( ! isset( $extra['dotfiles'] ) ) {
			throw new \InvalidArgumentException(
				'Unable to install dotfiles package, package.json should contain a dotfiles attribute inside extra'
			);
		}

		$dotfiles = $extra['dotfiles'];
		if ( empty( $dotfiles ) ) {
			throw new \InvalidArgumentException(
				'Unable to install dotfiles package, dotfiles attribute in your package.json should not be empty'
			);
		}

		$vendor_dir = $this->getInstallPath( $package );
		foreach ( $dotfiles as $dotfile ) {
			if ( file_exists( $dotfile ) ) {
				echo "$dotfile exists, dotfile not copied" . PHP_EOL;
			} else {
				$this->filesystem->copy( $vendor_dir . '/' . $dotfile, $dotfile );
			}
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports( $packageType ) {
		return 'dotfiles-library' === $packageType;
	}
}

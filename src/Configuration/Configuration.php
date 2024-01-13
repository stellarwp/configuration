<?php
/**
 * Handles loading feature flags and other configuration values.
 *
 * @since 1.0.0
 *
 * @package TEC\Common\Configuration;
 */

namespace StellarWP\Configuration;

use StellarWP\Configuration\Provider\ConfigurationProviderInterface;

/**
 * Class Configuration.
 *
 * @since 1.0.0
 *
 * @package TEC\Common\Configuration;
 */
class Configuration implements ConfigurationProviderInterface {
	/**
	 * The Configuration loader.
	 *
	 * @since 1.0.0
	 *
	 * @var ConfigurationLoader The loader.
	 */
	protected ConfigurationLoader $loader;

	/**
	 * The configuration service.
	 *
	 * @since 1.0.0
	 *
	 * @param ConfigurationLoader $loader
	 */
	public function __construct( ConfigurationLoader $loader ) {
		$this->loader = $loader;
	}

	/**
	 * @inheritDoc
	 */
	public function all(): array {
		$configs = [];
		foreach ( $this->loader->all() as $provider ) {
			$configs = array_merge( $configs, $provider->all() );
		}

		return $configs;
	}

	/**
	 * @inheritDoc
	 */
	public function get( $key ) {
		foreach ( $this->loader->all() as $provider ) {
			if ( $provider->has( $key ) ) {
				return $provider->get( $key );
			}
		}

		return null;
	}

	/**
	 * @inheritDoc
	 */
	public function has( $key ): bool {
		foreach ( $this->loader->all() as $provider ) {
			if ( $provider->has( $key ) ) {
				return true;
			}
		}

		return false;
	}
}

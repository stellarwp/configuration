<?php
/**
 * Handles loading configuration services.
 *
 * @since 5.1.3
 *
 * @package TEC\Common\Configuration;
 */

namespace StellarWP\Configuration;

use StellarWP\Configuration\Provider\ConfigurationProviderInterface;

/**
 * Class ConfigurationLoader.
 *
 * @since 5.1.3
 *
 * @package TEC\Common\Configuration;
 */
class ConfigurationLoader {
	/**
	 * @var array<ConfigurationProviderInterface>
	 */
	protected static $providers = [];

	/**
	 * Add a var provider to the list of providers referenced when accessing a variable
	 * from within the Configuration object.
	 *
	 * @since 5.1.3
	 *
	 * @param ConfigurationProviderInterface $provider
	 *
	 * @return $this
	 */
	public function add( ConfigurationProviderInterface $provider ): self {
		if ( is_callable( [ $provider, 'register' ] ) ) {
			$provider->register();
		}
		self::$providers[] = $provider;

		return $this;
	}

	/**
	 * Retrieve a list of all ConfigurationProviderInterface providers loaded.
	 *
	 * @since 5.1.3
	 *
	 * @return ConfigurationProviderInterface[]
	 */
	public function all(): array {
		return self::$providers;
	}

	/**
	 * Remove the providers.
	 *
	 * @since 5.1.3
	 *
	 * @return $this
	 */
	public function reset(): self {
		self::$providers = [];

		return $this;
	}
}

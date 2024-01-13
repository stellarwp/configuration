<?php
/**
 * Interface used to provider access to a particular configuration for the ConfigurationLoader.
 *
 * @since 1.0.0
 *
 * @package TEC\Common\Configuration;
 */

namespace StellarWP\Configuration\Provider;

/**
 * Interface ConfigurationProviderInterface.
 *
 * @since 1.0.0
 *
 * @package TEC\Common\Configuration;
 */
interface ConfigurationProviderInterface {
	/**
	 * Whether a particular variable is defined or not.
	 *
	 * @since 1.0.0
	 *
	 * @param $key string Variable name.
	 *
	 * @return bool Whether the variable is defined or not.
	 */
	public function has( string $key ): bool;

	/**
	 * Retrieves the value for the given variable.
	 *
	 * @since 1.0.0
	 *
	 * @param $key string Variable name.
	 *
	 * @return null|mixed
	 */
	public function get( string $key );

	/**
	 * Retrieve all variables defined in an associative array.
	 *
	 * @since 1.0.0
	 *
	 * @return array All vars.
	 */
	public function all(): array;
}

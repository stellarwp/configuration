<?php
/**
 * Provides a constants value for the ConfigurationLoader.
 *
 * @since 5.1.3
 *
 * @package TEC\Common\Configuration;
 */

namespace StellarWP\Configuration\Provider;

/**
 * Class ConstantsProvider.
 *
 * @since 5.1.3
 *
 * @package TEC\Common\Configuration;
 */
class ConstantsProvider implements ConfigurationProviderInterface {

	/**
	 * @inheritDoc
	 */
	public function has( $key ): bool {
		return defined( $key );
	}

	/**
	 * @inheritDoc
	 */
	public function get( $key ) {
		if ( $this->has( $key ) ) {
			return constant( $key );
		}
		return null;
	}

	/**
	 * @inheritDoc
	 */
	public function all(): array {
		return get_defined_constants( false );
	}
}

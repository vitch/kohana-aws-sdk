<?php defined('SYSPATH') or die('No direct access allowed.');

class Kohana_AWS
{

	public static function get_pas()
	{
		self::_initialise();
		require_once dirname(__FILE__) . '/../../vendor/aws-sdk-for-php/sdk.class.php';
		return new AmazonPAS();
	}

	private static $initialised;

	private static function _initialise()
	{
		if (!self::$initialised) {
			$config_keys = array(
				'AWS_KEY',
				'AWS_SECRET_KEY',
				'AWS_ACCOUNT_ID',
				'AWS_ASSOC_ID',
				'AWS_CANONICAL_ID',
				'AWS_CANONICAL_NAME',
				'AWS_MFA_SERIAL',
				'AWS_CLOUDFRONT_KEYPAIR_ID',
				'AWS_CLOUDFRONT_PRIVATE_KEY_PEM',
				'AWS_ENABLE_EXTENSIONS',
			);
			$config = Kohana::config('amazon');
			foreach ($config_keys as $key) {
					define($key, $config->{$key});
			}
			self::$initialised = true;
		}
	}
}

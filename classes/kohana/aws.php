<?php defined('SYSPATH') or die('No direct access allowed.');
require_once dirname(__FILE__) . '/../../vendor/aws-sdk-for-php/sdk.class.php';

class Kohana_AWS
{
	public static function get_as()
	{
		self::_initialise();
		return new AmazonAS();
	}

	public static function get_cloudformation()
	{
		self::_initialise();
		return new AmazonCloudFormation();
	}

	public static function get_cloudfront()
	{
		self::_initialise();
		return new AmazonCloudFront();
	}

	public static function get_cloudwatch()
	{
		self::_initialise();
		return new AmazonCloudWatch();
	}

	public static function get_ec2()
	{
		self::_initialise();
		return new AmazonEC2();
	}

	public static function get_beanstalk()
	{
		self::_initialise();
		return new AmazonElasticBeanstalk();
	}

	public static function get_elb()
	{
		self::_initialise();
		return new AmazonELB();
	}

	public static function get_emr()
	{
		self::_initialise();
		return new AmazonEMR();
	}

	public static function get_iam()
	{
		self::_initialise();
		return new AmazonIAM();
	}

	public static function get_importexport()
	{
		self::_initialise();
		return new AmazonImportExport();
	}

	public static function get_rds()
	{
		self::_initialise();
		return new AmazonRDS();
	}

	public static function get_sdb()
	{
		self::_initialise();
		return new AmazonSDB();
	}

	public static function get_ses()
	{
		self::_initialise();
		return new AmazonSES();
	}

	public static function get_sns()
	{
		self::_initialise();
		return new AmazonSNS();
	}

	public static function get_sqs()
	{
		self::_initialise();
		return new AmazonSQS();
	}

	public static function get_s3()
	{
		self::_initialise();
		return new AmazonS3();
	}


	public static function get_pas()
	{
		self::_initialise();
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

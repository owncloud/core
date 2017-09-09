<?php

namespace OC;

use Symfony\Component\Config\ConfigCache;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpFoundation\Request;

class Kernel {

	/**
	 * @var boolean
	 */
	private $booted = false;

	/**
	 * @var \OwnCloudContainer
	 */
	private $container;

	/**
	 * @var boolean
	 */
	private $debug;

	/**
	 * @param bool $debug
	 */
	public function __construct($debug = false) {
		$this->debug = $debug;
	}

	public function handle(Request $request) {
		if (!$this->booted) {
			$this->boot();
		}

		try {
			$this->handleRaw($request);
		} catch (\Exception $exception) {
			$this->handleException($exception);
		}

	}

	private function handleRaw(Request $request) {

	}

	private function boot() {
		$this->initializeContainer();
		$this->booted = true;
	}

	private function initializeContainer() {
		$cacheFile = __DIR__ . '/../cache/container.php';
		$containerConfigCache = new ConfigCache($cacheFile, $this->debug);

		if (!$containerConfigCache->isFresh()) {
			$containerBuilder = new ContainerBuilder();
			$yamlFileLoader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__ . '/../../config'));
			$yamlFileLoader->load('config.yml');

			$containerBuilder->compile();

			$dumper = new PhpDumper($containerBuilder);

			$containerConfigCache->write(
				$dumper->dump(array('class' => 'OwnCloudContainer')),
				$containerBuilder->getResources()
			);
		}

		require_once $cacheFile;

		$this->container = new \OwnCloudContainer();
	}

	/**
	 * @param \Exception $exception
	 */
	private function handleException(\Exception $exception) {
		// TODO: implement propper error handler
		var_dump($exception); die();
	}
}

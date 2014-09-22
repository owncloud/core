<?php
use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;
use Assetic\AssetWriter;
use Assetic\Filter\CssRewriteFilter;

/**
 * Copyright (c) 2012 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

class OC_TemplateLayout extends OC_Template {
	private static $scripts=array();
	private static $styles=array();
	private static $headers=array();

	/**
	 * @param string $renderas
	 * @param string $appid application id
	 */
	public function __construct( $renderas, $appid = '' ) {
		// Decide which page we show

		if( $renderas == 'user' ) {
			parent::__construct( 'core', 'layout.user' );
			if(in_array(OC_APP::getCurrentApp(), array('settings','admin', 'help'))!==false) {
				$this->assign('bodyid', 'body-settings');
			}else{
				$this->assign('bodyid', 'body-user');
			}

			// Update notification
			if(OC_Config::getValue('updatechecker', true) === true) {
				$data=OC_Updater::check();
				if(isset($data['version']) && $data['version'] != '' and $data['version'] !== Array() && OC_User::isAdminUser(OC_User::getUser())) {
					$this->assign('updateAvailable', true);
					$this->assign('updateVersion', $data['versionstring']);
					$this->assign('updateLink', $data['web']);
				} else {
					$this->assign('updateAvailable', false); // No update available or not an admin user
				}
			} else {
				$this->assign('updateAvailable', false); // Update check is disabled
			}

			// Add navigation entry
			$this->assign( 'application', '');
			$this->assign( 'appid', $appid );
			$navigation = OC_App::getNavigation();
			$this->assign( 'navigation', $navigation);
			$this->assign( 'settingsnavigation', OC_App::getSettingsNavigation());
			foreach($navigation as $entry) {
				if ($entry['active']) {
					$this->assign( 'application', $entry['name'] );
					break;
				}
			}
			$user_displayname = OC_User::getDisplayName();
			$this->assign( 'user_displayname', $user_displayname );
			$this->assign( 'user_uid', OC_User::getUser() );
			$this->assign( 'appsmanagement_active', strpos(OC_Request::requestUri(), OC_Helper::linkToRoute('settings_apps')) === 0 );
			$this->assign('enableAvatars', \OC_Config::getValue('enable_avatars', true));
		} else if ($renderas == 'error') {
			parent::__construct('core', 'layout.guest', '', false);
			$this->assign('bodyid', 'body-login');
		} else if ($renderas == 'guest') {
			parent::__construct('core', 'layout.guest');
			$this->assign('bodyid', 'body-login');
		} else {
			parent::__construct('core', 'layout.base');
		}

		$versionParameter = '?v=' . md5(implode(OC_Util::getVersion()));
		$useAssetPipeline = $this->isAssetPipelineEnabled();
		if ($useAssetPipeline) {

			$this->append( 'jsfiles', OC_Helper::linkToRoute('js_config') . $versionParameter);

			$this->generateAssets();

		} else {

			// Add the js files
			$jsfiles = $this->findJavascriptFiles(self::$scripts);
			$this->assign('jsfiles', array());
			if (OC_Config::getValue('installed', false) && $renderas!='error') {
				$this->append( 'jsfiles', OC_Helper::linkToRoute('js_config') . $versionParameter);
			}
			foreach($jsfiles as $info) {
				$web = $info[1];
				$file = $info[2];
				$this->append( 'jsfiles', $web.'/'.$file . $versionParameter);
			}

			// Add the css files
			$cssfiles = $this->findStylesheetFiles(self::$styles);
			$this->assign('cssfiles', array());
			foreach($cssfiles as $info) {
				$web = $info[1];
				$file = $info[2];

				$this->append( 'cssfiles', $web.'/'.$file . $versionParameter);
			}
		}
		$this->assign('headers', self::$headers);
	}

	/**
	 * add a javascript file
	 *
	 * @param string $application
	 * @param string|null $file filename
	 * @return void
	 */
	public static function addScript($application, $file = null) {
		if (is_null($file)) {
			$file = $application;
			$application = "";
		}
		if (!empty( $application)) {
			self::$scripts[] = "$application/js/$file";
		} else {
			self::$scripts[] = "js/$file";
		}
	}

	/**
	 * add a css file
	 *
	 * @param string $application
	 * @param string|null $file filename
	 * @return void
	 */
	public static function addStyle($application, $file = null) {
		if (is_null($file)) {
			$file = $application;
			$application = "";
		}
		if (!empty( $application)) {
			self::$styles[] = "$application/css/$file";
		} else {
			self::$styles[] = "css/$file";
		}
	}

	/**
	 * Add a custom element to the header
	 * @param string $tag tag name of the element
	 * @param array $attributes array of attributes for the element
	 * @param string $text the text content for the element
	 * @return void
	 */
	public static function addLayoutHeader($tag, $attributes, $text = '') {
		self::$headers[] = array(
			'tag' => $tag,
			'attributes' => $attributes,
			'text' => $text
		);
	}

	/**
	 * @param array $styles
	 * @return array
	 */
	private function findStylesheetFiles($styles) {
		// Read the selected theme from the config file
		$theme = OC_Util::getTheme();

		// Read the detected formfactor and use the right file name.
		$fext = self::getFormFactorExtension();

		$locator = new \OC\Template\CSSResourceLocator( $theme, $fext,
			array( OC::$SERVERROOT => OC::$WEBROOT ),
			array( OC::$THIRDPARTYROOT => OC::$THIRDPARTYWEBROOT ));
		$locator->find($styles);
		return $locator->getResources();
	}

	/**
	 * @param array $scripts
	 * @return array
	 */
	private function findJavascriptFiles($scripts) {
		// Read the selected theme from the config file
		$theme = OC_Util::getTheme();

		// Read the detected formfactor and use the right file name.
		$fext = self::getFormFactorExtension();

		$locator = new \OC\Template\JSResourceLocator( $theme, $fext,
			array( OC::$SERVERROOT => OC::$WEBROOT ),
			array( OC::$THIRDPARTYROOT => OC::$THIRDPARTYWEBROOT ));
		$locator->find($scripts);
		return $locator->getResources();
	}

	public function generateAssets()
	{
		$jsFiles = $this->findJavascriptFiles(self::$scripts);
		$jsHash = self::hashScriptNames($jsFiles);

		if (!file_exists("assets/$jsHash.js")) {
			$jsFiles = array_map(function ($item) {
				$root = $item[0];
				$file = $item[2];
				return new FileAsset($root . '/' . $file, array(), $root, $file);
			}, $jsFiles);
			$jsCollection = new AssetCollection($jsFiles);
			$jsCollection->setTargetPath("assets/$jsHash.js");

			$writer = new AssetWriter(\OC::$SERVERROOT);
			$writer->writeAsset($jsCollection);
		}

		$cssFiles = $this->findStylesheetFiles(self::$styles);
		$cssHash = self::hashScriptNames($cssFiles);

		if (!file_exists("assets/$cssHash.css")) {
			$cssFiles = array_map(function ($item) {
				$root = $item[0];
				$file = $item[2];
				$assetPath = $root . '/' . $file;
				$sourceRoot =  \OC::$SERVERROOT;
				$sourcePath = substr($assetPath, strlen(\OC::$SERVERROOT));
				return new FileAsset($assetPath, array(new CssRewriteFilter()), $sourceRoot, $sourcePath);
			}, $cssFiles);
			$cssCollection = new AssetCollection($cssFiles);
			$cssCollection->setTargetPath("assets/$cssHash.css");

			$writer = new AssetWriter(\OC::$SERVERROOT);
			$writer->writeAsset($cssCollection);
		}

		$this->append('jsfiles', OC_Helper::linkTo('assets', "$jsHash.js"));
		$this->append('cssfiles', OC_Helper::linkTo('assets', "$cssHash.css"));
	}

	/**
	 * @param array $files
	 * @return string
	 */
	private static function hashScriptNames($files)
	{
		$files = array_map(function ($item) {
			$root = $item[0];
			$file = $item[2];
			return $root . '/' . $file;
		}, $files);

		sort($files);
		return hash('md5', implode('', $files));
	}

	/**
	 * @return bool
	 */
	private function isAssetPipelineEnabled() {
		// asset management enabled?
		$useAssetPipeline = OC_Config::getValue('asset-pipeline.enabled', false);
		if (!$useAssetPipeline) {
			return false;
		}

		// assets folder exists?
		$assetDir = \OC::$SERVERROOT . '/assets';
		if (!is_dir($assetDir)) {
			if (!mkdir($assetDir)) {
				\OCP\Util::writeLog('assets',
					"Folder <$assetDir> does not exist and/or could not be generated.", \OCP\Util::ERROR);
				return false;
			}
		}

		// assets folder can be accessed?
		if (!touch($assetDir."/.oc")) {
			\OCP\Util::writeLog('assets',
				"Folder <$assetDir> could not be accessed.", \OCP\Util::ERROR);
			return false;
		}
		return $useAssetPipeline;
	}
}

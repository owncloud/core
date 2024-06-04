<?php
/**
 * @author Adam Williamson <awilliam@redhat.com>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Brice Maron <brice@bmaron.net>
 * @author Frank Karlitschek <frank@karlitschek.de>
 * @author Hendrik Leppelsack <hendrik@leppelsack.de>
 * @author Individual IT Services <info@individual-it.net>
 * @author Jakob Sack <mail@jakobsack.de>
 * @author Jan-Christoph Borchardt <hey@jancborchardt.net>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author phisch <git@philippschaffrath.de>
 * @author Raghu Nayyar <hey@raghunayyar.com>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

use OC\Log;
use OC\TemplateLayout;
use OCP\Theme\ITheme;

require_once __DIR__.'/template/functions.php';

/**
 * This class provides the templates for ownCloud.
 */
class OC_Template extends \OC\Template\Base {
	/**
	 * @var string
	 */
	private $renderAs;

	/**
	 * @var array
	 */
	private $headers = [];

	/**
	 * @var string
	 */
	protected $app;

	/**
	 * @var bool
	 */
	protected static $initTemplateEngineFirstRun = true;

	/**
	 * Constructor
	 *
	 * @param string $app app providing the template
	 * @param string $name of the template file (without suffix)
	 * @param string $renderAs If $renderAs is set, OC_Template will try to
	 *                         produce a full page in the according layout. For
	 *                         now, $renderAs can be set to "guest", "user" or
	 *                         "admin".
	 * @param bool $registerCall = true
	 * @param string|null $languageCode optional language used to render the template
	 */
	public function __construct($app, $name, $renderAs = "", $registerCall = true, $languageCode = null) {
		self::initTemplateEngine($renderAs);
		$requestToken = (OC::$server->getSession() && $registerCall) ? \OCP\Util::callRegister() : '';

		// fix translation when app is something like core/lostpassword
		$parts = \explode('/', $app);

		$l10n = \OC::$server->getL10N($parts[0], $languageCode);

		$theme = OC_Util::getTheme();
		$template = $this->findTemplate($theme, $app, $name);

		$this->renderAs = $renderAs;
		$this->app = $app;

		parent::__construct($template, $requestToken, $l10n, $theme, new OC_Defaults());
	}

	/**
	 * @param string $renderAs
	 * @throws Exception
	 */
	public static function initTemplateEngine($renderAs) {
		if (self::$initTemplateEngineFirstRun) {
			//apps that started before the template initialization can load their own scripts/styles
			//so to make sure this scripts/styles here are loaded first we use OC_Util::addScript() with $prepend=true
			//meaning the last script/style in this list will be loaded first
			if (\OC::$server->getSystemConfig()->getValue('installed', false) && $renderAs !== 'error' && !\OCP\Util::needUpgrade()) {
				if (\OC::$server->getConfig()->getAppValue('core', 'backgroundjobs_mode', 'ajax') == 'ajax') {
					OC_Util::addScript('backgroundjobs', null, true);
				}
			}

			OC_Util::addStyle("tooltip", null, true);
			OC_Util::addStyle('jquery-ui-fixes', null, true);
			OC_Util::addVendorStyle('jquery-ui/themes/base/jquery-ui', null, true);
			OC_Util::addStyle("mobile", null, true);
			OC_Util::addStyle("multiselect", null, true);
			OC_Util::addStyle("fixes", null, true);
			OC_Util::addStyle("global", null, true);
			OC_Util::addStyle("apps", null, true);
			OC_Util::addStyle("fonts", null, true);
			OC_Util::addStyle("icons", null, true);
			OC_Util::addStyle("header", null, true);
			OC_Util::addStyle("inputs", null, true);
			OC_Util::addStyle("styles", null, true);

			// avatars
			if (\OC::$server->getSystemConfig()->getValue('enable_avatars', true) === true) {
				\OC_Util::addScript('jquery.avatar', null, true);
				\OC_Util::addScript('placeholder', null, true);
			}

			OC_Util::addScript('oc-backbone-webdav', null, true);
			OC_Util::addScript('oc-backbone', null, true);
			OC_Util::addVendorScript('core', 'backbone/backbone', true);
			OC_Util::addVendorScript('core', 'select2/select2', true);
			OC_Util::addVendorStyle('select2/select2', null, true);
			OC_Util::addVendorScript('snapjs/dist/latest/snap', null, true);
			OC_Util::addScript('mimetypelist', null, true);
			OC_Util::addScript('mimetype', null, true);
			OC_Util::addScript("apps", null, true);
			OC_Util::addScript("oc-requesttoken", null, true);
			OC_Util::addScript('search', 'search', true);
			OC_Util::addScript("config", null, true);
			OC_Util::addScript("eventsource", null, true);
			OC_Util::addScript("octemplate", null, true);
			OC_Util::addTranslations("core", null, true);
			OC_Util::addScript("l10n", null, true);
			OC_Util::addScript("js", null, true);
			OC_Util::addScript("oc-dialogs", null, true);
			OC_Util::addScript("jquery.ocdialog", null, true);
			OC_Util::addStyle("jquery.ocdialog");
			OC_Util::addScript('files/fileinfo');
			OC_Util::addScript('files/client');

			// Add the stuff we need always
			// following logic will import all vendor libraries that are
			// specified in core/js/core.json
			$fileContent = \file_get_contents(OC::$SERVERROOT . '/core/js/core.json');
			if ($fileContent !== false) {
				$coreDependencies = \json_decode($fileContent, true);
				foreach (\array_reverse($coreDependencies['vendor']) as $vendorLibrary) {
					// remove trailing ".js" as addVendorScript will append it
					OC_Util::addVendorScript(
						\substr($vendorLibrary, 0, \strlen($vendorLibrary) - 3),
						null,
						true
					);
				}
			} else {
				throw new \Exception('Cannot read core/js/core.json');
			}

			self::$initTemplateEngineFirstRun = false;
		}
	}

	/**
	 * find the template with the given name
	 * @param string $name of the template file (without suffix)
	 *
	 * Will select the template file for the selected theme.
	 * Checking all the possible locations.
	 * @param ITheme $theme
	 * @param string $app
	 * @return string
	 */
	protected function findTemplate($theme, $app, $name) {
		// Check if it is a app template or not.
		if ($app === '' || $app === 'core') {
			$dirs = $this->getCoreTemplateDirs($theme, OC::$SERVERROOT);
		} elseif ($app === 'settings') {
			$dirs = $this->getSettingsTemplateDirs($theme, OC::$SERVERROOT);
		} else {
			$dirs = $this->getAppTemplateDirs($theme, $app, OC_App::getAppPath($app));
		}

		$locator = new \OC\Template\TemplateFileLocator($dirs);
		$template = $locator->find($name);

		return $template;
	}

	/**
	 * Add a custom element to the header
	 * @param string $tag tag name of the element
	 * @param array $attributes array of attributes for the element
	 * @param string $text the text content for the element. If $text is null then the
	 * element will be written as empty element. So use "" to get a closing tag.
	 */
	public function addHeader($tag, $attributes, $text=null) {
		$this->headers[]= [
			'tag' => $tag,
			'attributes' => $attributes,
			'text' => $text
		];
	}

	/**
	 * Process the template
	 *
	 * @param array|null $additionalParams
	 * @return bool|string This function process the template. If $this->renderAs is set, it
	 *
	 * This function process the template. If $this->renderAs is set, it
	 * will produce a full page.
	 */
	public function fetchPage($additionalParams = null) {
		$data = parent::fetchPage($additionalParams);

		if ($this->renderAs) {
			$page = new TemplateLayout($this->renderAs, $this->app);

			// Add custom headers
			$headers = '';
			foreach (OC_Util::$headers as $header) {
				$headers .= '<'.\OCP\Util::sanitizeHTML($header['tag']);
				foreach ($header['attributes'] as $name=>$value) {
					$headers .= ' '.\OCP\Util::sanitizeHTML($name).'="'.\OCP\Util::sanitizeHTML($value).'"';
				}
				if ($header['text'] !== null) {
					$headers .= '>'.\OCP\Util::sanitizeHTML($header['text']).'</'.\OCP\Util::sanitizeHTML($header['tag']).'>';
				} else {
					$headers .= '/>';
				}
			}

			$page->assign('headers', $headers);

			$page->assign('content', $data);
			return $page->fetchPage();
		}

		return $data;
	}

	/**
	 * Include template
	 *
	 * @param string $file
	 * @param array|null $additionalParams
	 * @return string returns content of included template
	 *
	 * Includes another template.
	 * use <?php print_unescaped($this->inc('template')); ?> to do this.
	 * use <?php print_unescaped($this->inc('template', ['app'=>'appName'])); ?>
	 * to include template from a different app.
	 */
	public function inc($file, $additionalParams = null) {
		$app = (isset($additionalParams['app'])) ? $additionalParams['app'] : $this->app;
		$template = $this->findTemplate($this->theme, $app, $file);
		return $this->load($template, $additionalParams);
	}

	/**
	 * Shortcut to print a simple page for users
	 * @param string $application The application we render the template for
	 * @param string $name Name of the template
	 * @param array $parameters Parameters for the template
	 * @return boolean|null
	 */
	public static function printUserPage($application, $name, $parameters = []) {
		$content = new OC_Template($application, $name, "user");
		foreach ($parameters as $key => $value) {
			$content->assign($key, $value);
		}
		print $content->printPage();
	}

	/**
	 * Shortcut to print a simple page for admins
	 * @param string $application The application we render the template for
	 * @param string $name Name of the template
	 * @param array $parameters Parameters for the template
	 * @return bool
	 */
	public static function printAdminPage($application, $name, $parameters = []) {
		$content = new OC_Template($application, $name, "admin");
		foreach ($parameters as $key => $value) {
			$content->assign($key, $value);
		}
		return $content->printPage();
	}

	/**
	 * Shortcut to print a simple page for guests
	 * @param string $application The application we render the template for
	 * @param string $name Name of the template
	 * @param array|string $parameters Parameters for the template
	 * @return bool
	 */
	public static function printGuestPage($application, $name, $parameters = []) {
		$content = new OC_Template($application, $name, "guest");
		foreach ($parameters as $key => $value) {
			$content->assign($key, $value);
		}
		return $content->printPage();
	}

	/**
		* Print a fatal error page and terminates the script
		* @param string $error_msg The error message to show
		* @param string $hint An optional hint message - needs to be properly escaped
		* @param int HTTP Status Code
		*/
	public static function printErrorPage($error_msg, $hint = '', $httpStatusCode = null) {
		if ($error_msg === $hint) {
			// If the hint is the same as the message there is no need to display it twice.
			$hint = '';
		}

		try {
			$content = new \OC_Template('', 'error', 'error', false);
			$errors = [['error' => $error_msg, 'hint' => $hint]];
			$content->assign('errors', $errors);
			if ($httpStatusCode !== null) {
				\http_response_code((int)$httpStatusCode);
			}
			$content->printPage();
		} catch (\Exception $e) {
			$logger = \OC::$server->getLogger();
			$logger->error("$error_msg $hint", ['app' => 'core']);
			$logger->logException($e, ['app' => 'core']);

			\header(self::getHttpProtocol() . ' 500 Internal Server Error');
			\header('Content-Type: text/plain; charset=utf-8');
			print("$error_msg $hint");
		}
		die();
	}

	/**
	 * print error page using Exception details
	 * @param Exception | Throwable $exception
	 * @param bool $fetchPage
	 * @return bool|string
	 */
	public static function printExceptionErrorPage($exception, $fetchPage = false) {
		try {
			$trace = Log::replaceSensitiveData($exception->getTraceAsString());

			$request = \OC::$server->getRequest();
			$content = new \OC_Template('', 'exception', 'error', false);
			$content->assign('errorClass', \get_class($exception));
			$content->assign('errorMsg', $exception->getMessage());
			$content->assign('errorCode', $exception->getCode());
			$content->assign('file', $exception->getFile());
			$content->assign('line', $exception->getLine());
			$content->assign('trace', $trace);
			$content->assign('debugMode', \OC::$server->getSystemConfig()->getValue('debug', false));
			$content->assign('remoteAddr', $request->getRemoteAddress());
			$content->assign('requestID', $request->getId());
			if ($fetchPage) {
				return $content->fetchPage();
			}
			$content->printPage();
		} catch (\Exception $e) {
			$logger = \OC::$server->getLogger();
			$logger->logException($exception, ['app' => 'core']);
			$logger->logException($e, ['app' => 'core']);

			\header(self::getHttpProtocol() . ' 500 Internal Server Error');
			\header('Content-Type: text/plain; charset=utf-8');
			print("Internal Server Error\n\n");
			print("The server encountered an internal error and was unable to complete your request.\n");
			print("Please contact the server administrator if this error reappears multiple times, please include the technical details below in your report.\n");
			print("More details can be found in the server log.\n");
		}
		die();
	}

	/**
	 * This is only here to reduce the dependencies in case of an exception to
	 * still be able to print a plain error message.
	 *
	 * Returns the used HTTP protocol.
	 *
	 * @return string HTTP protocol. HTTP/2, HTTP/1.1 or HTTP/1.0.
	 * @internal Don't use this - use AppFramework\Http\Request->getHttpProtocol instead
	 */
	protected static function getHttpProtocol() {
		$claimedProtocol = \strtoupper($_SERVER['SERVER_PROTOCOL']);
		$validProtocols = [
			'HTTP/1.0',
			'HTTP/1.1',
			'HTTP/2',
		];
		if (\in_array($claimedProtocol, $validProtocols, true)) {
			return $claimedProtocol;
		}
		return 'HTTP/1.1';
	}
}

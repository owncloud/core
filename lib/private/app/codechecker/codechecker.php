<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace OC\App\CodeChecker;

use OC\App\CodeChecker\Checks\PrivateCode\Consts;
use OC\App\CodeChecker\Checks\PrivateCode\NewClass;
use OC\App\CodeChecker\Checks\PrivateCode\StaticCall;
use OC\App\CodeChecker\Checks\Security\ComparisonOperators;
use OC\App\CodeChecker\Checks\PrivateCode\ExtendPrivateClasses;
use OC\App\CodeChecker\Checks\PrivateCode\ImplementsPrivateClasses;
use OC\Hooks\BasicEmitter;
use PhpParser\Lexer;
use PhpParser\Node;
use PhpParser\Node\Name;
use PhpParser\Parser;
use PhpParser\Serializer\XML;
use RecursiveCallbackFilterIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;
use SplFileInfo;

class CodeChecker extends BasicEmitter {

	const CLASS_EXTENDS_NOT_ALLOWED = 1000;
	const CLASS_IMPLEMENTS_NOT_ALLOWED = 1001;
	const STATIC_CALL_NOT_ALLOWED = 1002;
	const CLASS_CONST_FETCH_NOT_ALLOWED = 1003;
	const CLASS_NEW_FETCH_NOT_ALLOWED =  1004;
	const OP_OPERATOR_USAGE_DISCOURAGED =  1005;

	/** @var Parser */
	private $parser;

	/** @var XML */
	private $serializer;

	/** @var string[] Array list of blacklisted API calls - should be removed by generic OC_ in the future */
	private $blackListedClassNames;

	public function __construct() {
		$this->parser = new Parser(new Lexer);
		$this->serializer = new XML();
		$this->blackListedClassNames = array_map('strtoupper', [
			// classes replaced by the public api
			'OC_API',
			'OC_App',
			'OC_AppConfig',
			'OC_Avatar',
			'OC_BackgroundJob',
			'OC_Config',
			'OC_DB',
			'OC_Files',
			'OC_Helper',
			'OC_Hook',
			'OC_Image',
			'OC_JSON',
			'OC_L10N',
			'OC_Log',
			'OC_Mail',
			'OC_Preferences',
			'OC_Request',
			'OC_Response',
			'OC_Template',
			'OC_User',
			'OC_Util',
		]);
	}

	/**
	 * @param string $appId
	 * @return array
	 */
	public function analyse($appId) {
		$appPath = \OC_App::getAppPath($appId);
		if ($appPath === false) {
			throw new \RuntimeException("No app with given id <$appId> known.");
		}

		return $this->analyseFolder($appPath);
	}

	/**
	 * @param string $folder
	 * @return array
	 */
	public function analyseFolder($folder) {
		$errors = [];

		$excludes = array_map(function($item) use ($folder) {
			return $folder . '/' . $item;
		}, ['vendor', '3rdparty', '.git', 'l10n', 'tests', 'test']);

		$iterator = new RecursiveDirectoryIterator($folder, RecursiveDirectoryIterator::SKIP_DOTS);
		$iterator = new RecursiveCallbackFilterIterator($iterator, function($item) use ($folder, $excludes){
			/** @var SplFileInfo $item */
			foreach($excludes as $exclude) {
				if (substr($item->getPath(), 0, strlen($exclude)) === $exclude) {
					return false;
				}
			}
			return true;
		});
		$iterator = new RecursiveIteratorIterator($iterator);
		$iterator = new RegexIterator($iterator, '/^.+\.php$/i');

		foreach ($iterator as $file) {
			/** @var SplFileInfo $file */
			$this->emit('CodeChecker', 'analyseFileBegin', [$file->getPathname()]);
			$fileErrors = $this->analyseFile($file);
			$this->emit('CodeChecker', 'analyseFileFinished', [$file->getPathname(), $fileErrors]);
			$errors = array_merge($fileErrors, $errors);
		}

		return $errors;
	}


	/**
	 * @param string $file
	 * @return array
	 */
	public function analyseFile($file) {
		$code = file_get_contents($file);
		$statements = $this->parser->parse($code);
		$serializedAst = $this->serializer->serialize($statements);
		$loadEntities = libxml_disable_entity_loader(true);
		$serializedAst = simplexml_load_string($serializedAst);
		libxml_disable_entity_loader($loadEntities);

		$check = new Check($serializedAst, $this->blackListedClassNames);
		$check->attach(new ComparisonOperators);
		$check->attach(new ExtendPrivateClasses());
		$check->attach(new ImplementsPrivateClasses());
		$check->attach(new Consts());
		$check->attach(new StaticCall());
		$check->attach(new NewClass());
		$check->scan();

		return $check->getErrors();
	}
}

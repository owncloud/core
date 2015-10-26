<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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


require_once(dirname(__DIR__) . '/3rdparty/autoload.php');

/**
 * Class SinceTagCheckVisitor
 *
 * this class checks all methods for the presence of the @since tag
 */
class SinceTagCheckVisitor extends \PhpParser\NodeVisitorAbstract {

	/** @var string */
	protected $namespace = '';
	/** @var string */
	protected $className = '';

	public function enterNode(\PhpParser\Node $node) {
		if($node instanceof \PhpParser\Node\Stmt\Namespace_) {
			$this->namespace = $node->name;
		}

		if($node instanceof \PhpParser\Node\Stmt\Class_ || 
		   $node instanceof \PhpParser\Node\Stmt\Interface_ ||
		   $node instanceof \PhpParser\Node\Stmt\Trait_) {
			$this->className = $node->name;
		}
	}

	/**
	 * Get the service name of the parced file
	 *
	 * @return string|null The service name is returned or null if none could be constructed
	 */
	public function getServiceName() {
		if ($this->className === '') {
			return null;
		}

		if ($this->namespace === '') {
			return $this->className;
		}

		return $this->namespace . '\\' . $this->className;
	}
}

function parseDir($dir) {
	$parser = new PhpParser\Parser(new PhpParser\Lexer);

	/* iterate over all .php files in lib/public */
	$Directory = new RecursiveDirectoryIterator($dir);
	$Iterator = new RecursiveIteratorIterator($Directory);
	$Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

	$mappings = [];

	foreach($Regex as $file) {
		$stmts = $parser->parse(file_get_contents($file[0]));

		$visitor = new SinceTagCheckVisitor($this->blackListedClassNames);
		$traverser = new \PhpParser\NodeTraverser();
		$traverser->addVisitor($visitor);
		$traverser->traverse($stmts);

		$serviceName = $visitor->getServiceName();

		if ($serviceName !== null) {
			$mappings[$serviceName] = $file[0];
		}
	}

	return $mappings;
}

$mappings = [];

$mappings = array_merge($mappings, parseDir('lib'));
$mappings = array_merge($mappings, parseDir('apps/dav/lib'));
$mappings = array_merge($mappings, parseDir('apps/files/lib'));
$mappings = array_merge($mappings, parseDir('apps/files_sharing/lib'));
$mappings = array_merge($mappings, parseDir('apps/files_trashbin/lib'));
$mappings = array_merge($mappings, parseDir('apps/files_versions/lib'));


echo "<?php\n";
echo "return ".var_export($mappings, true).";";

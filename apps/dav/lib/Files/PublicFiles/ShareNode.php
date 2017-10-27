<?php
/**
 * Created by PhpStorm.
 * User: deepdiver
 * Date: 26.10.17
 * Time: 14:40
 */

namespace OCA\DAV\Files\PublicFiles;


use OCP\Files\FileInfo;
use OCP\Files\Node;
use OCP\Share\IShare;
use Sabre\DAV\Collection;
use Sabre\DAV\INode;

class ShareNode extends Collection {

	/** @var IShare */
	private $share;

	public function __construct(IShare $share) {
		$this->share = $share;
	}
	/**
	 * Returns an array with all the child nodes
	 *
	 * @return INode[]
	 */
	function getChildren() {
		if ($this->share->getNodeType() === 'folder') {
			$nodes = $this->share->getNode()->getDirectoryListing();
		} else {
			$nodes = [$this->share->getNode()];
		}
		return array_map(function(Node $node) {
			if ($node->getType() === FileInfo::TYPE_FOLDER) {
				return new SharedFolder($node, $this->share);
			}
			return new SharedFile($node, $this->share);
		}, $nodes);
	}

	/**
	 * Returns the name of the node.
	 *
	 * This is used to generate the url.
	 *
	 * @return string
	 */
	function getName() {
		return $this->share->getToken();
	}

	function getShare() {
		return $this->share;
	}
}
<?php
/**
 * @author Ahmed Ammar <ahmed.a.ammar@gmail.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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
namespace OCA\DAV\Upload;

use Sabre\DAV\IFile;

/**
 * Class AssemblyStreamZsync
 *
 * The assembly stream is a virtual stream that wraps multiple chunks.
 * Reading from the stream transparently accessed the underlying chunks and
 * give a representation as if they were already merged together.
 *
 * @package OCA\DAV\Upload
 */
class AssemblyStreamZsync extends AssemblyStream {

	/** @var array */
	private $backingFile = null;

	/** @var array */
	private $backingNode = null;

	/** @var array */
	private $currentNode = null;

	/** @var int */
	private $next = 0;

	/**
	 * @param string $path
	 * @param string $mode
	 * @param int $options
	 * @param string &$opened_path
	 * @return bool
	 */
	public function stream_open($path, $mode, $options, &$opened_path) {
		$this->loadContext('assembly');

		// sort the nodes
		$nodes = $this->nodes;
		// http://stackoverflow.com/a/10985500
		@usort($nodes, function(IFile $a, IFile $b) {
			return strnatcmp($a->getName(), $b->getName());
		});
		$this->nodes = $nodes;

		// build additional information
		$this->sortedNodes = [];
		foreach($this->nodes as $node) {
			$size = $node->getSize();
			$name = $node->getName();
			// ignore .zsync metadata file
			if (!strcmp($name,".zsync"))
				continue;
			if ($size == 0)
				continue;
			$this->sortedNodes[$name] = ['node' => $node, 'start' => (int)$name, 'end' => (int)$name + $size];
		}

		$this->backingNode = ["node" => $this->backingFile, "start" => 0, "end" => $this->backingFile->getSize()];
		$this->currentNode = $this->backingNode;
		return true;
	}

	/**
	 * @param int $count
	 * @return string
	 */
	public function stream_read($count) {
		// we're done if we've reached the end of where we need to be
		if ($this->pos >= $this->size)
			return;

		// change the node/stream when we've reached the point we need to be at
		if ($this->currentStream === null || $this->pos == $this->next) {
			list($node, $posInNode) = $this->getNodeForPosition($this->pos);
			$this->currentStream = $this->getStream($node['node']);
			fseek($this->currentStream, $posInNode);
			$this->currentNode = $node;
		}

		// get the next byte offset when we need to change node/stream again
		if ($this->pos == $this->next)
			$this->next = $this->getNextNodeStart($this->pos);

		// don't read beyond the expected file size
		if ($count + $this->pos >= $this->size)
			$count = $this->size - $this->pos;

		// don't read beyond the next marker
		if ($count + $this->pos >= $this->next)
			$count = $this->next - $this->pos;

		// read the data
		$data = fread($this->currentStream, $count);
		if (isset($data[$count - 1])) {
			// we read the full count
			$read = $count;
		} else {
			// reaching end of stream, which happens less often so strlen is ok
			$read = strlen($data);
		}

		// update position
		$this->pos += $read;

		// if we couldn't read as much as expected we are done
		if ($read != $count) {
			$this->pos = $this->size;
		}

		// ensure we close the last stream or else we'll cause a locking issue
		if ($this->pos == $this->size) {
			$this->currentStream = null;
		}

		return $data;
	}

	/**
	 * Load the source from the stream context and return the context options
	 *
	 * @param string $name
	 * @return array
	 * @throws \Exception
	 */
	protected function loadContext($name) {
		$context = stream_context_get_options($this->context);
		if (isset($context[$name])) {
			$context = $context[$name];
		} else {
			throw new \BadMethodCallException('Invalid context, "' . $name . '" options not set');
		}
		if (isset($context['nodes']) and is_array($context['nodes'])) {
			$this->nodes = $context['nodes'];
		} else {
			throw new \BadMethodCallException('Invalid context, nodes not set');
		}
		if (isset($context['backingFile'])) {
			$this->backingFile = $context['backingFile'];
		} else {
			throw new \BadMethodCallException('Invalid context, backingFile not set');
		}
		if (isset($context['fileLength'])) {
			$this->size = $context['fileLength'];
		} else {
			throw new \BadMethodCallException('Invalid context, fileLength not set');
		}

		return $context;
	}

	/**
	 * @param IFile[] $nodes
	 * @param IFile $backingFile
	 * @param $fileLength
	 * @return resource
	 *
	 * @throws \BadMethodCallException
	 */
	public static function wrap(array $nodes, IFile $backingFile = null, $fileLength = null) {
		$context = stream_context_create([
			'assembly' => [
				'nodes' => $nodes,
				'backingFile' => $backingFile,
				'fileLength' => $fileLength
			]
		]);
		stream_wrapper_register('assembly', '\OCA\DAV\Upload\AssemblyStreamZsync');
		try {
			$wrapped = fopen('assembly://', 'r', null, $context);
		} catch (\BadMethodCallException $e) {
			stream_wrapper_unregister('assembly');
			throw $e;
		}
		stream_wrapper_unregister('assembly');
		return $wrapped;
	}

	protected function getNextNodeStart($current) {
		foreach($this->sortedNodes as $node) {
			if ($current >= $node['start'] && $current < $node['end'])
				return $node['end'];
			if ($current < $node['start'])
				return $node['start'];
		}
		return $this->currentNode['end'];
	}

	/**
	 * @param $pos
	 */
	protected function getNodeForPosition($pos) {
		foreach($this->sortedNodes as $node) {
			if ($pos >= $node['start'] && $pos < $node['end']) {
				return [$node, 0];
			}
		}
		return [$this->backingNode, $pos];
	}
}

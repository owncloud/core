<?php

class IndexFileCacheVisitor implements \FileCacheVisitor {
	
	private $eventSource;
	private $count;
	private $lastSent;
	/**
	 * @param OC_EventSource $eventSource (optional)
	 */
	public function __construct($eventSource=null) {
		$this->eventSource = $eventSource;
		$this->count = 0;
	}

	/**
	 * @param OC_FilesystemView | OC_Filestorage $view
	 * @param string $path
	 */
	public function enterDirectory($view, $path) {
		// NOTE: Ugly hack to prevent shared files from going into the cache (the source already exists somewhere in the cache)
		if (substr($path, 0, 7) == '/Shared') {
			return true;
		}
		return $this->visitFile($view, $path);
		
	}
	/**
	 * @param OC_FilesystemView | OC_Filestorage $view
	 * @param string $path
	 */
	public function leaveDirectory($view, $path) {
		// NOTE: Ugly hack to prevent shared files from going into the cache (the source already exists somewhere in the cache)
		if (substr($path, 0, 7) == '/Shared') {
			return true;
		}
		
		return true;
		
	}
	/**
	 * @param OC_FilesystemView | OC_Filestorage $view
	 * @param string $path
	 */
	public function visitFile($view, $path) {
		
		// NOTE: Ugly hack to prevent shared files from going into the cache (the source already exists somewhere in the cache)
		if (substr($path, 0, 7) == '/Shared') {
			return true;
		}
		
		OC_Search_Lucene_Indexer::indexFile($path);
		
		$this->count++;
		//send to eventsource if present
		if( $this->eventSource) {
			$this->eventSource->send('indexing', array('file'=>$path, 'count'=>$this->count));
		}
		return true;
		
	}
}
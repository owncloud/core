<?php

header('Content-type: text/html; charset=UTF-8') ;

OCP\JSON::checkLoggedIn();
OCP\JSON::checkAppEnabled('search_lucene');

function handleReIndex($dir = '/') {
	/*
	 OCP\DB::beginTransaction();
	 set_time_limit(0);
	 OC_Gallery_Album::cleanup();
	 $eventSource = new OC_EventSource();
	 OC_Gallery_Scanner::scan($eventSource);
	 $eventSource->close();
	 OCP\DB::commit();
	 * 
	 */
	
	set_time_limit(0);//scanning can take ages
	$eventSource = new OC_EventSource();
	
	$v = new IndexFileCacheVisitor($eventSource);
	OC_FileCache::walk($v, $dir);
	
	$eventSource->close();
	
	$eventSource->send('success', true);
}

function handleOptimize() {
	OC_Search_Lucene::optimizeIndex();
}

if ($_GET['operation']) {
	switch($_GET['operation']) {
		case 'reindex':
			handleReIndex($_GET['dir']);
			break;
		case 'optimize':
			handleOptimize();
			break;
		default:
			OCP\JSON::error(array('cause' => 'Unknown operation'));
	}
}

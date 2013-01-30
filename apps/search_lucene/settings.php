<?php

$tmpl = new OC_Template('search_lucene', 'settings');

$index = OC_Search_Lucene::openOrCreate();

if ( $index===null ) {
	$tmpl->assign('index_created', false);
} else {
	$tmpl->assign('index_created', true);
	$tmpl->assign('index_count', $index->count());
	$tmpl->assign('index_numDocs', $index->numDocs());
	
	$query=OC_DB::prepare('SELECT count(*) AS `count` FROM `*PREFIX*fscache` WHERE `user`=?');
	$result=$query->execute(array(OC_User::getUser()));
	$row=$result->fetchRow();
		
	$tmpl->assign('files_count', $row['count']);
}

return $tmpl->fetchPage();
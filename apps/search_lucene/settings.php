<?php

$tmpl = new OC_Template( 'search_lucene', 'settings');

$index = OC_Search_Lucene::openOrCreate();

if ( $index===null ) {
    
    $tmpl->assign('index_created', false );

} else {
    $tmpl->assign('index_created', true );
    $tmpl->assign('index_count', $index->count() );
    $tmpl->assign('index_numDocs', $index->numDocs() );
}

return $tmpl->fetchPage();
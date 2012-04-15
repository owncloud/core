<?php

$tmpl = new OC_Template( 'lucene_search', 'settings');

$index = OC_Lucene_Search::open();

if ( $index===null ) {
    
    $tmpl->assign('index_created', false );

} else {
    $tmpl->assign('index_created', true );
    $tmpl->assign('index_count', $index->count() );
    $tmpl->assign('index_numDocs', $index->numDocs() );
}

return $tmpl->fetchPage();
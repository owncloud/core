
$(document).ready(function() {
	$('#startluceneindexer').click(function(){
		indexFiles(true, '/')
	});

});


function indexFiles(force,dir){
	if(!dir){
		dir='/';
	}
	force=!!force; //cast to bool
	indexFiles.indexing=true;
	$('#index-message').show();
	var indexerEventSource=new OC.EventSource(OC.filePath('search_lucene','ajax','lucene.php'),{operation:'reindex', dir:dir});
	indexFiles.cancel=indexerEventSource.close.bind(indexerEventSource);
	indexerEventSource.listen('indexing',function(data){
		$('#index-count').text(data.count);
		$('#index-current').text(data.file);
	});
	indexerEventSource.listen('success',function(success){
		indexFiles.indexing=false;
		if(!success){
			alert(t('files', 'error while scanning'));
		}
	});
}
indexFiles.indexing=false;
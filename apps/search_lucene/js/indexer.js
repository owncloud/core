LuceneIndexer={
  dirtyFiles:0,
  indexedFiles:0,
  eventSource:null,
  albumsScanned:0,
  syncFromCache:function(callback){
      
    $.getJSON(OC.linkTo('search_lucene','ajax/indexerOp.php'),{action: 'sync'},function(data){
        //TODO why is this code never executed
        LuceneIndexer.indexFiles();
        if(callback){
                callback(songs);
        }
    });
    
    //LuceneIndexer.eventSource=new OC.EventSource(OC.linkTo('search_lucene', 'ajax/indexerOp.php'),{operation:'sync'});

    //LuceneIndexer.eventSource.listen('done', function(){
        //index files when sync is complete
    //    LuceneIndexer.indexFiles();
    //});
    //if (callback)
    //  callback();
  },
  indexFiles:function(callback){
    LuceneIndexer.indexedFiles=0;
    LuceneIndexer.eventSource=new OC.EventSource(OC.linkTo('search_lucene', 'ajax/indexerOp.php'),{action:'index'});
    LuceneIndexer.eventSource.listen('count', function(total){LuceneIndexer.dirtyFiles=total;});
    LuceneIndexer.eventSource.listen('indexing', function(data) {
      LuceneIndexer.indexedFiles++;
    });
    LuceneIndexer.eventSource.listen('done', function(count){
        //TODO wait for new files befor indexing? load next chunk of files to index?
    });
    if (callback)
      callback();
  }
}

LuceneIndexer.syncFromCache();
//TODO move this to the callback in syncFromCache
LuceneIndexer.indexFiles();
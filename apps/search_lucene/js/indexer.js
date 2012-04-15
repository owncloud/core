LuceneIndexer={
  dirtyFiles:0,
  indexedFiles:0,
  eventSource:null,
  albumsScanned:0,
  indexFiles:function(callback){
    LuceneIndexer.indexedFiles=0;
    LuceneIndexer.eventSource=new OC.EventSource(OC.linkTo('search_lucene', 'ajax/indexerOp.php'),{operation:'index'});
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

LuceneIndexer.indexFiles();
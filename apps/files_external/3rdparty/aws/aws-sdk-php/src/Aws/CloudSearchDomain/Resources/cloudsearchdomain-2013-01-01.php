<?php

return array (
    'apiVersion' => '2013-01-01',
    'endpointPrefix' => 'cloudsearchdomain',
    'serviceFullName' => 'Amazon CloudSearchDomain',
    'serviceType' => 'rest-json',
    'signatureVersion' => 'v4',
    'signingName' => 'cloudsearch',
    'namespace' => 'CloudSearchDomain',
    'operations' => array(
        'Search' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-01-01/search?format=sdk&pretty=true',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'SearchResponse',
            'responseType' => 'model',
            'parameters' => array(
                'cursor' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'expr' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'facet' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'filterQuery' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'fq',
                ),
                'highlight' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'partial' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'query',
                ),
                'query' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'q',
                ),
                'queryOptions' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'q.options',
                ),
                'queryParser' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'q.parser',
                ),
                'return' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'size' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                ),
                'sort' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'start' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Information about any problems encountered while processing a search request.',
                    'class' => 'SearchException',
                ),
            ),
        ),
        'Suggest' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-01-01/suggest?format=sdk&pretty=true',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'SuggestResponse',
            'responseType' => 'model',
            'parameters' => array(
                'query' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'q',
                ),
                'suggester' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                ),
                'size' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Information about any problems encountered while processing a search request.',
                    'class' => 'SearchException',
                ),
            ),
        ),
        'UploadDocuments' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-01-01/documents/batch?format=sdk',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UploadDocumentsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'documents' => array(
                    'required' => true,
                    'type' => array(
                        'string',
                        'object',
                    ),
                    'location' => 'body',
                ),
                'contentType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Type',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Information about any problems encountered while processing an upload request.',
                    'class' => 'DocumentServiceException',
                ),
            ),
        ),
    ),
    'models' => array(
        'SearchResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'status' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'timems' => array(
                            'type' => 'numeric',
                        ),
                        'rid' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'hits' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'found' => array(
                            'type' => 'numeric',
                        ),
                        'start' => array(
                            'type' => 'numeric',
                        ),
                        'cursor' => array(
                            'type' => 'string',
                        ),
                        'hit' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Hit',
                                'type' => 'object',
                                'properties' => array(
                                    'id' => array(
                                        'type' => 'string',
                                    ),
                                    'fields' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'String',
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'highlights' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'facets' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'properties' => array(
                            'buckets' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Bucket',
                                    'type' => 'object',
                                    'properties' => array(
                                        'value' => array(
                                            'type' => 'string',
                                        ),
                                        'count' => array(
                                            'type' => 'numeric',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'SuggestResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'status' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'timems' => array(
                            'type' => 'numeric',
                        ),
                        'rid' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'suggest' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'query' => array(
                            'type' => 'string',
                        ),
                        'found' => array(
                            'type' => 'numeric',
                        ),
                        'suggestions' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'SuggestionMatch',
                                'type' => 'object',
                                'properties' => array(
                                    'suggestion' => array(
                                        'type' => 'string',
                                    ),
                                    'score' => array(
                                        'type' => 'numeric',
                                    ),
                                    'id' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'UploadDocumentsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'adds' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'deletes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'warnings' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DocumentServiceWarning',
                        'type' => 'object',
                        'properties' => array(
                            'message' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);

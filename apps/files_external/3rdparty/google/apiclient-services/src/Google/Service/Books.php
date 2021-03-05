<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * Service definition for Books (v1).
 *
 * <p>
 * The Google Books API allows clients to access the Google Books repository.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://code.google.com/apis/books/docs/v1/getting_started.html" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Books extends Google_Service
{
  /** Manage your books. */
  const BOOKS =
      "https://www.googleapis.com/auth/books";

  public $bookshelves;
  public $bookshelves_volumes;
  public $cloudloading;
  public $dictionary;
  public $familysharing;
  public $layers;
  public $layers_annotationData;
  public $layers_volumeAnnotations;
  public $myconfig;
  public $mylibrary_annotations;
  public $mylibrary_bookshelves;
  public $mylibrary_bookshelves_volumes;
  public $mylibrary_readingpositions;
  public $notification;
  public $onboarding;
  public $personalizedstream;
  public $promooffer;
  public $series;
  public $series_membership;
  public $volumes;
  public $volumes_associated;
  public $volumes_mybooks;
  public $volumes_recommended;
  public $volumes_useruploaded;

  /**
   * Constructs the internal representation of the Books service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://books.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'books';

    $this->bookshelves = new Google_Service_Books_Resource_Bookshelves(
        $this,
        $this->serviceName,
        'bookshelves',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'books/v1/users/{userId}/bookshelves/{shelf}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'books/v1/users/{userId}/bookshelves',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->bookshelves_volumes = new Google_Service_Books_Resource_BookshelvesVolumes(
        $this,
        $this->serviceName,
        'volumes',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'books/v1/users/{userId}/bookshelves/{shelf}/volumes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'showPreorders' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->cloudloading = new Google_Service_Books_Resource_Cloudloading(
        $this,
        $this->serviceName,
        'cloudloading',
        array(
          'methods' => array(
            'addBook' => array(
              'path' => 'books/v1/cloudloading/addBook',
              'httpMethod' => 'POST',
              'parameters' => array(
                'drive_document_id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'mime_type' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'upload_client_token' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'deleteBook' => array(
              'path' => 'books/v1/cloudloading/deleteBook',
              'httpMethod' => 'POST',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'updateBook' => array(
              'path' => 'books/v1/cloudloading/updateBook',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->dictionary = new Google_Service_Books_Resource_Dictionary(
        $this,
        $this->serviceName,
        'dictionary',
        array(
          'methods' => array(
            'listOfflineMetadata' => array(
              'path' => 'books/v1/dictionary/listOfflineMetadata',
              'httpMethod' => 'GET',
              'parameters' => array(
                'cpksver' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->familysharing = new Google_Service_Books_Resource_Familysharing(
        $this,
        $this->serviceName,
        'familysharing',
        array(
          'methods' => array(
            'getFamilyInfo' => array(
              'path' => 'books/v1/familysharing/getFamilyInfo',
              'httpMethod' => 'GET',
              'parameters' => array(
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'share' => array(
              'path' => 'books/v1/familysharing/share',
              'httpMethod' => 'POST',
              'parameters' => array(
                'docId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'unshare' => array(
              'path' => 'books/v1/familysharing/unshare',
              'httpMethod' => 'POST',
              'parameters' => array(
                'docId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->layers = new Google_Service_Books_Resource_Layers(
        $this,
        $this->serviceName,
        'layers',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'books/v1/volumes/{volumeId}/layersummary/{summaryId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'summaryId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'books/v1/volumes/{volumeId}/layersummary',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->layers_annotationData = new Google_Service_Books_Resource_LayersAnnotationData(
        $this,
        $this->serviceName,
        'annotationData',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'books/v1/volumes/{volumeId}/layers/{layerId}/data/{annotationDataId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'layerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'annotationDataId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'allowWebDefinitions' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'h' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scale' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'w' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'list' => array(
              'path' => 'books/v1/volumes/{volumeId}/layers/{layerId}/data',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'layerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'annotationDataId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'h' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scale' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMax' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'w' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->layers_volumeAnnotations = new Google_Service_Books_Resource_LayersVolumeAnnotations(
        $this,
        $this->serviceName,
        'volumeAnnotations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'books/v1/volumes/{volumeId}/layers/{layerId}/annotations/{annotationId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'layerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'annotationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'books/v1/volumes/{volumeId}/layers/{layerId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'layerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'endOffset' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'endPosition' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startOffset' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startPosition' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMax' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'volumeAnnotationsVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->myconfig = new Google_Service_Books_Resource_Myconfig(
        $this,
        $this->serviceName,
        'myconfig',
        array(
          'methods' => array(
            'getUserSettings' => array(
              'path' => 'books/v1/myconfig/getUserSettings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'releaseDownloadAccess' => array(
              'path' => 'books/v1/myconfig/releaseDownloadAccess',
              'httpMethod' => 'POST',
              'parameters' => array(
                'cpksver' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumeIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'requestAccess' => array(
              'path' => 'books/v1/myconfig/requestAccess',
              'httpMethod' => 'POST',
              'parameters' => array(
                'cpksver' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'nonce' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'licenseTypes' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'syncVolumeLicenses' => array(
              'path' => 'books/v1/myconfig/syncVolumeLicenses',
              'httpMethod' => 'POST',
              'parameters' => array(
                'cpksver' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'nonce' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'features' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'includeNonComicsSeries' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showPreorders' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'volumeIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'updateUserSettings' => array(
              'path' => 'books/v1/myconfig/updateUserSettings',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->mylibrary_annotations = new Google_Service_Books_Resource_MylibraryAnnotations(
        $this,
        $this->serviceName,
        'annotations',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'books/v1/mylibrary/annotations/{annotationId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'annotationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'books/v1/mylibrary/annotations',
              'httpMethod' => 'POST',
              'parameters' => array(
                'annotationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showOnlySummaryInResponse' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'books/v1/mylibrary/annotations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'layerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'layerIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMax' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'summary' => array(
              'path' => 'books/v1/mylibrary/annotations/summary',
              'httpMethod' => 'POST',
              'parameters' => array(
                'layerIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'books/v1/mylibrary/annotations/{annotationId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'annotationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->mylibrary_bookshelves = new Google_Service_Books_Resource_MylibraryBookshelves(
        $this,
        $this->serviceName,
        'bookshelves',
        array(
          'methods' => array(
            'addVolume' => array(
              'path' => 'books/v1/mylibrary/bookshelves/{shelf}/addVolume',
              'httpMethod' => 'POST',
              'parameters' => array(
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'reason' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'clearVolumes' => array(
              'path' => 'books/v1/mylibrary/bookshelves/{shelf}/clearVolumes',
              'httpMethod' => 'POST',
              'parameters' => array(
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'books/v1/mylibrary/bookshelves/{shelf}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'books/v1/mylibrary/bookshelves',
              'httpMethod' => 'GET',
              'parameters' => array(
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'moveVolume' => array(
              'path' => 'books/v1/mylibrary/bookshelves/{shelf}/moveVolume',
              'httpMethod' => 'POST',
              'parameters' => array(
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumePosition' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'removeVolume' => array(
              'path' => 'books/v1/mylibrary/bookshelves/{shelf}/removeVolume',
              'httpMethod' => 'POST',
              'parameters' => array(
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'reason' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->mylibrary_bookshelves_volumes = new Google_Service_Books_Resource_MylibraryBookshelvesVolumes(
        $this,
        $this->serviceName,
        'volumes',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'books/v1/mylibrary/bookshelves/{shelf}/volumes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'shelf' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showPreorders' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->mylibrary_readingpositions = new Google_Service_Books_Resource_MylibraryReadingpositions(
        $this,
        $this->serviceName,
        'readingpositions',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'books/v1/mylibrary/readingpositions/{volumeId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'setPosition' => array(
              'path' => 'books/v1/mylibrary/readingpositions/{volumeId}/setPosition',
              'httpMethod' => 'POST',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'position' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'timestamp' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'action' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'contentVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'deviceCookie' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->notification = new Google_Service_Books_Resource_Notification(
        $this,
        $this->serviceName,
        'notification',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'books/v1/notification/get',
              'httpMethod' => 'GET',
              'parameters' => array(
                'notification_id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->onboarding = new Google_Service_Books_Resource_Onboarding(
        $this,
        $this->serviceName,
        'onboarding',
        array(
          'methods' => array(
            'listCategories' => array(
              'path' => 'books/v1/onboarding/listCategories',
              'httpMethod' => 'GET',
              'parameters' => array(
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listCategoryVolumes' => array(
              'path' => 'books/v1/onboarding/listCategoryVolumes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'categoryId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxAllowedMaturityRating' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->personalizedstream = new Google_Service_Books_Resource_Personalizedstream(
        $this,
        $this->serviceName,
        'personalizedstream',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'books/v1/personalizedstream/get',
              'httpMethod' => 'GET',
              'parameters' => array(
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxAllowedMaturityRating' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->promooffer = new Google_Service_Books_Resource_Promooffer(
        $this,
        $this->serviceName,
        'promooffer',
        array(
          'methods' => array(
            'accept' => array(
              'path' => 'books/v1/promooffer/accept',
              'httpMethod' => 'POST',
              'parameters' => array(
                'androidId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'device' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'manufacturer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'model' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'offerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'product' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'serial' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'dismiss' => array(
              'path' => 'books/v1/promooffer/dismiss',
              'httpMethod' => 'POST',
              'parameters' => array(
                'androidId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'device' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'manufacturer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'model' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'offerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'product' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'serial' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'books/v1/promooffer/get',
              'httpMethod' => 'GET',
              'parameters' => array(
                'androidId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'device' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'manufacturer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'model' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'product' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'serial' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->series = new Google_Service_Books_Resource_Series(
        $this,
        $this->serviceName,
        'series',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'books/v1/series/get',
              'httpMethod' => 'GET',
              'parameters' => array(
                'series_id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->series_membership = new Google_Service_Books_Resource_SeriesMembership(
        $this,
        $this->serviceName,
        'membership',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'books/v1/series/membership/get',
              'httpMethod' => 'GET',
              'parameters' => array(
                'series_id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'page_size' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'page_token' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->volumes = new Google_Service_Books_Resource_Volumes(
        $this,
        $this->serviceName,
        'volumes',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'books/v1/volumes/{volumeId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeNonComicsSeries' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'partner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'user_library_consistent_read' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'books/v1/volumes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'download' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'langRestrict' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'libraryRestrict' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxAllowedMaturityRating' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'printType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showPreorders' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->volumes_associated = new Google_Service_Books_Resource_VolumesAssociated(
        $this,
        $this->serviceName,
        'associated',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'books/v1/volumes/{volumeId}/associated',
              'httpMethod' => 'GET',
              'parameters' => array(
                'volumeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'association' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxAllowedMaturityRating' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->volumes_mybooks = new Google_Service_Books_Resource_VolumesMybooks(
        $this,
        $this->serviceName,
        'mybooks',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'books/v1/volumes/mybooks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'acquireMethod' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'processingState' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->volumes_recommended = new Google_Service_Books_Resource_VolumesRecommended(
        $this,
        $this->serviceName,
        'recommended',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'books/v1/volumes/recommended',
              'httpMethod' => 'GET',
              'parameters' => array(
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxAllowedMaturityRating' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'rate' => array(
              'path' => 'books/v1/volumes/recommended/rate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'rating' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->volumes_useruploaded = new Google_Service_Books_Resource_VolumesUseruploaded(
        $this,
        $this->serviceName,
        'useruploaded',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'books/v1/volumes/useruploaded',
              'httpMethod' => 'GET',
              'parameters' => array(
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'processingState' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'volumeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}

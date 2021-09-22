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

namespace Google\Service;

use Google\Client;

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
class Books extends \Google\Service
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
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://books.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'books';

    $this->bookshelves = new Books\Resource\Bookshelves(
        $this,
        $this->serviceName,
        'bookshelves',
        [
          'methods' => [
            'get' => [
              'path' => 'books/v1/users/{userId}/bookshelves/{shelf}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'shelf' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'books/v1/users/{userId}/bookshelves',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->bookshelves_volumes = new Books\Resource\BookshelvesVolumes(
        $this,
        $this->serviceName,
        'volumes',
        [
          'methods' => [
            'list' => [
              'path' => 'books/v1/users/{userId}/bookshelves/{shelf}/volumes',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'shelf' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'showPreorders' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startIndex' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->cloudloading = new Books\Resource\Cloudloading(
        $this,
        $this->serviceName,
        'cloudloading',
        [
          'methods' => [
            'addBook' => [
              'path' => 'books/v1/cloudloading/addBook',
              'httpMethod' => 'POST',
              'parameters' => [
                'drive_document_id' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'mime_type' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'upload_client_token' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'deleteBook' => [
              'path' => 'books/v1/cloudloading/deleteBook',
              'httpMethod' => 'POST',
              'parameters' => [
                'volumeId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateBook' => [
              'path' => 'books/v1/cloudloading/updateBook',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->dictionary = new Books\Resource\Dictionary(
        $this,
        $this->serviceName,
        'dictionary',
        [
          'methods' => [
            'listOfflineMetadata' => [
              'path' => 'books/v1/dictionary/listOfflineMetadata',
              'httpMethod' => 'GET',
              'parameters' => [
                'cpksver' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->familysharing = new Books\Resource\Familysharing(
        $this,
        $this->serviceName,
        'familysharing',
        [
          'methods' => [
            'getFamilyInfo' => [
              'path' => 'books/v1/familysharing/getFamilyInfo',
              'httpMethod' => 'GET',
              'parameters' => [
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'share' => [
              'path' => 'books/v1/familysharing/share',
              'httpMethod' => 'POST',
              'parameters' => [
                'docId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'volumeId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'unshare' => [
              'path' => 'books/v1/familysharing/unshare',
              'httpMethod' => 'POST',
              'parameters' => [
                'docId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'volumeId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->layers = new Books\Resource\Layers(
        $this,
        $this->serviceName,
        'layers',
        [
          'methods' => [
            'get' => [
              'path' => 'books/v1/volumes/{volumeId}/layersummary/{summaryId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'volumeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'summaryId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'contentVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'books/v1/volumes/{volumeId}/layersummary',
              'httpMethod' => 'GET',
              'parameters' => [
                'volumeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'contentVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->layers_annotationData = new Books\Resource\LayersAnnotationData(
        $this,
        $this->serviceName,
        'annotationData',
        [
          'methods' => [
            'get' => [
              'path' => 'books/v1/volumes/{volumeId}/layers/{layerId}/data/{annotationDataId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'volumeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'layerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'annotationDataId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'contentVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'allowWebDefinitions' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'h' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'scale' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'w' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'list' => [
              'path' => 'books/v1/volumes/{volumeId}/layers/{layerId}/data',
              'httpMethod' => 'GET',
              'parameters' => [
                'volumeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'layerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'contentVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'annotationDataId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'h' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'scale' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updatedMax' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updatedMin' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'w' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->layers_volumeAnnotations = new Books\Resource\LayersVolumeAnnotations(
        $this,
        $this->serviceName,
        'volumeAnnotations',
        [
          'methods' => [
            'get' => [
              'path' => 'books/v1/volumes/{volumeId}/layers/{layerId}/annotations/{annotationId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'volumeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'layerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'annotationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'books/v1/volumes/{volumeId}/layers/{layerId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'volumeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'layerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'contentVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'endOffset' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'endPosition' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startOffset' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startPosition' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updatedMax' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updatedMin' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'volumeAnnotationsVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->myconfig = new Books\Resource\Myconfig(
        $this,
        $this->serviceName,
        'myconfig',
        [
          'methods' => [
            'getUserSettings' => [
              'path' => 'books/v1/myconfig/getUserSettings',
              'httpMethod' => 'GET',
              'parameters' => [
                'country' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'releaseDownloadAccess' => [
              'path' => 'books/v1/myconfig/releaseDownloadAccess',
              'httpMethod' => 'POST',
              'parameters' => [
                'cpksver' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'volumeIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'requestAccess' => [
              'path' => 'books/v1/myconfig/requestAccess',
              'httpMethod' => 'POST',
              'parameters' => [
                'cpksver' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'nonce' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'volumeId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'licenseTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'syncVolumeLicenses' => [
              'path' => 'books/v1/myconfig/syncVolumeLicenses',
              'httpMethod' => 'POST',
              'parameters' => [
                'cpksver' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'nonce' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'features' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'includeNonComicsSeries' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showPreorders' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'volumeIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'updateUserSettings' => [
              'path' => 'books/v1/myconfig/updateUserSettings',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->mylibrary_annotations = new Books\Resource\MylibraryAnnotations(
        $this,
        $this->serviceName,
        'annotations',
        [
          'methods' => [
            'delete' => [
              'path' => 'books/v1/mylibrary/annotations/{annotationId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'annotationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'books/v1/mylibrary/annotations',
              'httpMethod' => 'POST',
              'parameters' => [
                'annotationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'country' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showOnlySummaryInResponse' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'books/v1/mylibrary/annotations',
              'httpMethod' => 'GET',
              'parameters' => [
                'contentVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'layerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'layerIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updatedMax' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updatedMin' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'volumeId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'summary' => [
              'path' => 'books/v1/mylibrary/annotations/summary',
              'httpMethod' => 'POST',
              'parameters' => [
                'layerIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'volumeId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'books/v1/mylibrary/annotations/{annotationId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'annotationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->mylibrary_bookshelves = new Books\Resource\MylibraryBookshelves(
        $this,
        $this->serviceName,
        'bookshelves',
        [
          'methods' => [
            'addVolume' => [
              'path' => 'books/v1/mylibrary/bookshelves/{shelf}/addVolume',
              'httpMethod' => 'POST',
              'parameters' => [
                'shelf' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'volumeId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'reason' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'clearVolumes' => [
              'path' => 'books/v1/mylibrary/bookshelves/{shelf}/clearVolumes',
              'httpMethod' => 'POST',
              'parameters' => [
                'shelf' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'books/v1/mylibrary/bookshelves/{shelf}',
              'httpMethod' => 'GET',
              'parameters' => [
                'shelf' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'books/v1/mylibrary/bookshelves',
              'httpMethod' => 'GET',
              'parameters' => [
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'moveVolume' => [
              'path' => 'books/v1/mylibrary/bookshelves/{shelf}/moveVolume',
              'httpMethod' => 'POST',
              'parameters' => [
                'shelf' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'volumeId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'volumePosition' => [
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removeVolume' => [
              'path' => 'books/v1/mylibrary/bookshelves/{shelf}/removeVolume',
              'httpMethod' => 'POST',
              'parameters' => [
                'shelf' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'volumeId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'reason' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->mylibrary_bookshelves_volumes = new Books\Resource\MylibraryBookshelvesVolumes(
        $this,
        $this->serviceName,
        'volumes',
        [
          'methods' => [
            'list' => [
              'path' => 'books/v1/mylibrary/bookshelves/{shelf}/volumes',
              'httpMethod' => 'GET',
              'parameters' => [
                'shelf' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'country' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'projection' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showPreorders' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startIndex' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->mylibrary_readingpositions = new Books\Resource\MylibraryReadingpositions(
        $this,
        $this->serviceName,
        'readingpositions',
        [
          'methods' => [
            'get' => [
              'path' => 'books/v1/mylibrary/readingpositions/{volumeId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'volumeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'contentVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setPosition' => [
              'path' => 'books/v1/mylibrary/readingpositions/{volumeId}/setPosition',
              'httpMethod' => 'POST',
              'parameters' => [
                'volumeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'position' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'timestamp' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'action' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'contentVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'deviceCookie' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->notification = new Books\Resource\Notification(
        $this,
        $this->serviceName,
        'notification',
        [
          'methods' => [
            'get' => [
              'path' => 'books/v1/notification/get',
              'httpMethod' => 'GET',
              'parameters' => [
                'notification_id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->onboarding = new Books\Resource\Onboarding(
        $this,
        $this->serviceName,
        'onboarding',
        [
          'methods' => [
            'listCategories' => [
              'path' => 'books/v1/onboarding/listCategories',
              'httpMethod' => 'GET',
              'parameters' => [
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'listCategoryVolumes' => [
              'path' => 'books/v1/onboarding/listCategoryVolumes',
              'httpMethod' => 'GET',
              'parameters' => [
                'categoryId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxAllowedMaturityRating' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->personalizedstream = new Books\Resource\Personalizedstream(
        $this,
        $this->serviceName,
        'personalizedstream',
        [
          'methods' => [
            'get' => [
              'path' => 'books/v1/personalizedstream/get',
              'httpMethod' => 'GET',
              'parameters' => [
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxAllowedMaturityRating' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->promooffer = new Books\Resource\Promooffer(
        $this,
        $this->serviceName,
        'promooffer',
        [
          'methods' => [
            'accept' => [
              'path' => 'books/v1/promooffer/accept',
              'httpMethod' => 'POST',
              'parameters' => [
                'androidId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'device' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'manufacturer' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'model' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'offerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'product' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'serial' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'volumeId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'dismiss' => [
              'path' => 'books/v1/promooffer/dismiss',
              'httpMethod' => 'POST',
              'parameters' => [
                'androidId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'device' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'manufacturer' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'model' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'offerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'product' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'serial' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'books/v1/promooffer/get',
              'httpMethod' => 'GET',
              'parameters' => [
                'androidId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'device' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'manufacturer' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'model' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'product' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'serial' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->series = new Books\Resource\Series(
        $this,
        $this->serviceName,
        'series',
        [
          'methods' => [
            'get' => [
              'path' => 'books/v1/series/get',
              'httpMethod' => 'GET',
              'parameters' => [
                'series_id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->series_membership = new Books\Resource\SeriesMembership(
        $this,
        $this->serviceName,
        'membership',
        [
          'methods' => [
            'get' => [
              'path' => 'books/v1/series/membership/get',
              'httpMethod' => 'GET',
              'parameters' => [
                'series_id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'page_size' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'page_token' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->volumes = new Books\Resource\Volumes(
        $this,
        $this->serviceName,
        'volumes',
        [
          'methods' => [
            'get' => [
              'path' => 'books/v1/volumes/{volumeId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'volumeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'country' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeNonComicsSeries' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'partner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projection' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'user_library_consistent_read' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'books/v1/volumes',
              'httpMethod' => 'GET',
              'parameters' => [
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'download' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'langRestrict' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'libraryRestrict' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxAllowedMaturityRating' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'printType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projection' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showPreorders' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startIndex' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->volumes_associated = new Books\Resource\VolumesAssociated(
        $this,
        $this->serviceName,
        'associated',
        [
          'methods' => [
            'list' => [
              'path' => 'books/v1/volumes/{volumeId}/associated',
              'httpMethod' => 'GET',
              'parameters' => [
                'volumeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'association' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxAllowedMaturityRating' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->volumes_mybooks = new Books\Resource\VolumesMybooks(
        $this,
        $this->serviceName,
        'mybooks',
        [
          'methods' => [
            'list' => [
              'path' => 'books/v1/volumes/mybooks',
              'httpMethod' => 'GET',
              'parameters' => [
                'acquireMethod' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'country' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'processingState' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startIndex' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->volumes_recommended = new Books\Resource\VolumesRecommended(
        $this,
        $this->serviceName,
        'recommended',
        [
          'methods' => [
            'list' => [
              'path' => 'books/v1/volumes/recommended',
              'httpMethod' => 'GET',
              'parameters' => [
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxAllowedMaturityRating' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'rate' => [
              'path' => 'books/v1/volumes/recommended/rate',
              'httpMethod' => 'POST',
              'parameters' => [
                'rating' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'volumeId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->volumes_useruploaded = new Books\Resource\VolumesUseruploaded(
        $this,
        $this->serviceName,
        'useruploaded',
        [
          'methods' => [
            'list' => [
              'path' => 'books/v1/volumes/useruploaded',
              'httpMethod' => 'GET',
              'parameters' => [
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'processingState' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startIndex' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'volumeId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Books::class, 'Google_Service_Books');

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
 * Service definition for AndroidPublisher (v3).
 *
 * <p>
 * Lets Android application developers access their Google Play accounts.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/android-publisher" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class AndroidPublisher extends \Google\Service
{
  /** View and manage your Google Play Developer account. */
  const ANDROIDPUBLISHER =
      "https://www.googleapis.com/auth/androidpublisher";

  public $edits;
  public $edits_apks;
  public $edits_bundles;
  public $edits_deobfuscationfiles;
  public $edits_details;
  public $edits_expansionfiles;
  public $edits_images;
  public $edits_listings;
  public $edits_testers;
  public $edits_tracks;
  public $grants;
  public $inappproducts;
  public $internalappsharingartifacts;
  public $monetization;
  public $orders;
  public $purchases_products;
  public $purchases_subscriptions;
  public $purchases_voidedpurchases;
  public $reviews;
  public $systemapks_variants;
  public $users;

  /**
   * Constructs the internal representation of the AndroidPublisher service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://androidpublisher.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v3';
    $this->serviceName = 'androidpublisher';

    $this->edits = new AndroidPublisher\Resource\Edits(
        $this,
        $this->serviceName,
        'edits',
        [
          'methods' => [
            'commit' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}:commit',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'changesNotSentForReview' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'validate' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}:validate',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->edits_apks = new AndroidPublisher\Resource\EditsApks(
        $this,
        $this->serviceName,
        'apks',
        [
          'methods' => [
            'addexternallyhosted' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks/externallyHosted',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'upload' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->edits_bundles = new AndroidPublisher\Resource\EditsBundles(
        $this,
        $this->serviceName,
        'bundles',
        [
          'methods' => [
            'list' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/bundles',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'upload' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/bundles',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ackBundleInstallationWarning' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->edits_deobfuscationfiles = new AndroidPublisher\Resource\EditsDeobfuscationfiles(
        $this,
        $this->serviceName,
        'deobfuscationfiles',
        [
          'methods' => [
            'upload' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks/{apkVersionCode}/deobfuscationFiles/{deobfuscationFileType}',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'apkVersionCode' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
                'deobfuscationFileType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->edits_details = new AndroidPublisher\Resource\EditsDetails(
        $this,
        $this->serviceName,
        'details',
        [
          'methods' => [
            'get' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/details',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/details',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/details',
              'httpMethod' => 'PUT',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->edits_expansionfiles = new AndroidPublisher\Resource\EditsExpansionfiles(
        $this,
        $this->serviceName,
        'expansionfiles',
        [
          'methods' => [
            'get' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks/{apkVersionCode}/expansionFiles/{expansionFileType}',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'apkVersionCode' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
                'expansionFileType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks/{apkVersionCode}/expansionFiles/{expansionFileType}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'apkVersionCode' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
                'expansionFileType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks/{apkVersionCode}/expansionFiles/{expansionFileType}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'apkVersionCode' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
                'expansionFileType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'upload' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks/{apkVersionCode}/expansionFiles/{expansionFileType}',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'apkVersionCode' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
                'expansionFileType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->edits_images = new AndroidPublisher\Resource\EditsImages(
        $this,
        $this->serviceName,
        'images',
        [
          'methods' => [
            'delete' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}/{imageType}/{imageId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'imageType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'imageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'deleteall' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}/{imageType}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'imageType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}/{imageType}',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'imageType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'upload' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}/{imageType}',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'imageType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->edits_listings = new AndroidPublisher\Resource\EditsListings(
        $this,
        $this->serviceName,
        'listings',
        [
          'methods' => [
            'delete' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'deleteall' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->edits_testers = new AndroidPublisher\Resource\EditsTesters(
        $this,
        $this->serviceName,
        'testers',
        [
          'methods' => [
            'get' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/testers/{track}',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'track' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/testers/{track}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'track' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/testers/{track}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'track' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->edits_tracks = new AndroidPublisher\Resource\EditsTracks(
        $this,
        $this->serviceName,
        'tracks',
        [
          'methods' => [
            'get' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/tracks/{track}',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'track' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/tracks',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/tracks/{track}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'track' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/tracks/{track}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'editId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'track' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->grants = new AndroidPublisher\Resource\Grants(
        $this,
        $this->serviceName,
        'grants',
        [
          'methods' => [
            'create' => [
              'path' => 'androidpublisher/v3/{+parent}/grants',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'androidpublisher/v3/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'androidpublisher/v3/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->inappproducts = new AndroidPublisher\Resource\Inappproducts(
        $this,
        $this->serviceName,
        'inappproducts',
        [
          'methods' => [
            'delete' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/inappproducts/{sku}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sku' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/inappproducts/{sku}',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sku' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/inappproducts',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'autoConvertMissingPrices' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/inappproducts',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startIndex' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'token' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/inappproducts/{sku}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sku' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'autoConvertMissingPrices' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/inappproducts/{sku}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sku' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'allowMissing' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'autoConvertMissingPrices' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->internalappsharingartifacts = new AndroidPublisher\Resource\Internalappsharingartifacts(
        $this,
        $this->serviceName,
        'internalappsharingartifacts',
        [
          'methods' => [
            'uploadapk' => [
              'path' => 'androidpublisher/v3/applications/internalappsharing/{packageName}/artifacts/apk',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'uploadbundle' => [
              'path' => 'androidpublisher/v3/applications/internalappsharing/{packageName}/artifacts/bundle',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->monetization = new AndroidPublisher\Resource\Monetization(
        $this,
        $this->serviceName,
        'monetization',
        [
          'methods' => [
            'convertRegionPrices' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/pricing:convertRegionPrices',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->orders = new AndroidPublisher\Resource\Orders(
        $this,
        $this->serviceName,
        'orders',
        [
          'methods' => [
            'refund' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/orders/{orderId}:refund',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'revoke' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->purchases_products = new AndroidPublisher\Resource\PurchasesProducts(
        $this,
        $this->serviceName,
        'products',
        [
          'methods' => [
            'acknowledge' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/products/{productId}/tokens/{token}:acknowledge',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'token' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/products/{productId}/tokens/{token}',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'token' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->purchases_subscriptions = new AndroidPublisher\Resource\PurchasesSubscriptions(
        $this,
        $this->serviceName,
        'subscriptions',
        [
          'methods' => [
            'acknowledge' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/subscriptions/{subscriptionId}/tokens/{token}:acknowledge',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'token' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'cancel' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/subscriptions/{subscriptionId}/tokens/{token}:cancel',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'token' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'defer' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/subscriptions/{subscriptionId}/tokens/{token}:defer',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'token' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/subscriptions/{subscriptionId}/tokens/{token}',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'token' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'refund' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/subscriptions/{subscriptionId}/tokens/{token}:refund',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'token' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'revoke' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/subscriptions/{subscriptionId}/tokens/{token}:revoke',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'token' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->purchases_voidedpurchases = new AndroidPublisher\Resource\PurchasesVoidedpurchases(
        $this,
        $this->serviceName,
        'voidedpurchases',
        [
          'methods' => [
            'list' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/voidedpurchases',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'endTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startIndex' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'token' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->reviews = new AndroidPublisher\Resource\Reviews(
        $this,
        $this->serviceName,
        'reviews',
        [
          'methods' => [
            'get' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/reviews/{reviewId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reviewId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'translationLanguage' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/reviews',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startIndex' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'token' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'translationLanguage' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'reply' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/reviews/{reviewId}:reply',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reviewId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->systemapks_variants = new AndroidPublisher\Resource\SystemapksVariants(
        $this,
        $this->serviceName,
        'variants',
        [
          'methods' => [
            'create' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/systemApks/{versionCode}/variants',
              'httpMethod' => 'POST',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'versionCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'download' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/systemApks/{versionCode}/variants/{variantId}:download',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'versionCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'variantId' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/systemApks/{versionCode}/variants/{variantId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'versionCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'variantId' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidpublisher/v3/applications/{packageName}/systemApks/{versionCode}/variants',
              'httpMethod' => 'GET',
              'parameters' => [
                'packageName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'versionCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users = new AndroidPublisher\Resource\Users(
        $this,
        $this->serviceName,
        'users',
        [
          'methods' => [
            'create' => [
              'path' => 'androidpublisher/v3/{+parent}/users',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'androidpublisher/v3/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidpublisher/v3/{+parent}/users',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
            ],'patch' => [
              'path' => 'androidpublisher/v3/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidPublisher::class, 'Google_Service_AndroidPublisher');

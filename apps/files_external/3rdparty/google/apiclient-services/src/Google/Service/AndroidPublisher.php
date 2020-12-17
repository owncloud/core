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
class Google_Service_AndroidPublisher extends Google_Service
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
  public $inappproducts;
  public $internalappsharingartifacts;
  public $orders;
  public $purchases_products;
  public $purchases_subscriptions;
  public $purchases_voidedpurchases;
  public $reviews;
  public $systemapks_variants;

  /**
   * Constructs the internal representation of the AndroidPublisher service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://androidpublisher.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v3';
    $this->serviceName = 'androidpublisher';

    $this->edits = new Google_Service_AndroidPublisher_Resource_Edits(
        $this,
        $this->serviceName,
        'edits',
        array(
          'methods' => array(
            'commit' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}:commit',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'validate' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}:validate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->edits_apks = new Google_Service_AndroidPublisher_Resource_EditsApks(
        $this,
        $this->serviceName,
        'apks',
        array(
          'methods' => array(
            'addexternallyhosted' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks/externallyHosted',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'upload' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->edits_bundles = new Google_Service_AndroidPublisher_Resource_EditsBundles(
        $this,
        $this->serviceName,
        'bundles',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/bundles',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'upload' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/bundles',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ackBundleInstallationWarning' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->edits_deobfuscationfiles = new Google_Service_AndroidPublisher_Resource_EditsDeobfuscationfiles(
        $this,
        $this->serviceName,
        'deobfuscationfiles',
        array(
          'methods' => array(
            'upload' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks/{apkVersionCode}/deobfuscationFiles/{deobfuscationFileType}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'apkVersionCode' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'deobfuscationFileType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->edits_details = new Google_Service_AndroidPublisher_Resource_EditsDetails(
        $this,
        $this->serviceName,
        'details',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/details',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/details',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/details',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->edits_expansionfiles = new Google_Service_AndroidPublisher_Resource_EditsExpansionfiles(
        $this,
        $this->serviceName,
        'expansionfiles',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks/{apkVersionCode}/expansionFiles/{expansionFileType}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'apkVersionCode' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'expansionFileType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks/{apkVersionCode}/expansionFiles/{expansionFileType}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'apkVersionCode' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'expansionFileType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks/{apkVersionCode}/expansionFiles/{expansionFileType}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'apkVersionCode' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'expansionFileType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'upload' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/apks/{apkVersionCode}/expansionFiles/{expansionFileType}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'apkVersionCode' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
                'expansionFileType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->edits_images = new Google_Service_AndroidPublisher_Resource_EditsImages(
        $this,
        $this->serviceName,
        'images',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}/{imageType}/{imageId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'imageType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'imageId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'deleteall' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}/{imageType}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'imageType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}/{imageType}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'imageType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'upload' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}/{imageType}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'imageType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->edits_listings = new Google_Service_AndroidPublisher_Resource_EditsListings(
        $this,
        $this->serviceName,
        'listings',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'deleteall' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/listings/{language}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->edits_testers = new Google_Service_AndroidPublisher_Resource_EditsTesters(
        $this,
        $this->serviceName,
        'testers',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/testers/{track}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'track' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/testers/{track}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'track' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/testers/{track}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'track' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->edits_tracks = new Google_Service_AndroidPublisher_Resource_EditsTracks(
        $this,
        $this->serviceName,
        'tracks',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/tracks/{track}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'track' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/tracks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/tracks/{track}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'track' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/edits/{editId}/tracks/{track}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'editId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'track' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->inappproducts = new Google_Service_AndroidPublisher_Resource_Inappproducts(
        $this,
        $this->serviceName,
        'inappproducts',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/inappproducts/{sku}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sku' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/inappproducts/{sku}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sku' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/inappproducts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'autoConvertMissingPrices' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/inappproducts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'token' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/inappproducts/{sku}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sku' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'autoConvertMissingPrices' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'update' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/inappproducts/{sku}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sku' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'autoConvertMissingPrices' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->internalappsharingartifacts = new Google_Service_AndroidPublisher_Resource_Internalappsharingartifacts(
        $this,
        $this->serviceName,
        'internalappsharingartifacts',
        array(
          'methods' => array(
            'uploadapk' => array(
              'path' => 'androidpublisher/v3/applications/internalappsharing/{packageName}/artifacts/apk',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'uploadbundle' => array(
              'path' => 'androidpublisher/v3/applications/internalappsharing/{packageName}/artifacts/bundle',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->orders = new Google_Service_AndroidPublisher_Resource_Orders(
        $this,
        $this->serviceName,
        'orders',
        array(
          'methods' => array(
            'refund' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/orders/{orderId}:refund',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'revoke' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->purchases_products = new Google_Service_AndroidPublisher_Resource_PurchasesProducts(
        $this,
        $this->serviceName,
        'products',
        array(
          'methods' => array(
            'acknowledge' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/products/{productId}/tokens/{token}:acknowledge',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'productId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'token' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/products/{productId}/tokens/{token}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'productId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'token' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->purchases_subscriptions = new Google_Service_AndroidPublisher_Resource_PurchasesSubscriptions(
        $this,
        $this->serviceName,
        'subscriptions',
        array(
          'methods' => array(
            'acknowledge' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/subscriptions/{subscriptionId}/tokens/{token}:acknowledge',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'subscriptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'token' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'cancel' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/subscriptions/{subscriptionId}/tokens/{token}:cancel',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'subscriptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'token' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'defer' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/subscriptions/{subscriptionId}/tokens/{token}:defer',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'subscriptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'token' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/subscriptions/{subscriptionId}/tokens/{token}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'subscriptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'token' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'refund' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/subscriptions/{subscriptionId}/tokens/{token}:refund',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'subscriptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'token' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'revoke' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/subscriptions/{subscriptionId}/tokens/{token}:revoke',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'subscriptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'token' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->purchases_voidedpurchases = new Google_Service_AndroidPublisher_Resource_PurchasesVoidedpurchases(
        $this,
        $this->serviceName,
        'voidedpurchases',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/purchases/voidedpurchases',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'token' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->reviews = new Google_Service_AndroidPublisher_Resource_Reviews(
        $this,
        $this->serviceName,
        'reviews',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/reviews/{reviewId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'reviewId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'translationLanguage' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/reviews',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'token' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'translationLanguage' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'reply' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/reviews/{reviewId}:reply',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'reviewId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->systemapks_variants = new Google_Service_AndroidPublisher_Resource_SystemapksVariants(
        $this,
        $this->serviceName,
        'variants',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/systemApks/{versionCode}/variants',
              'httpMethod' => 'POST',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'versionCode' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'download' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/systemApks/{versionCode}/variants/{variantId}:download',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'versionCode' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'variantId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/systemApks/{versionCode}/variants/{variantId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'versionCode' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'variantId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'androidpublisher/v3/applications/{packageName}/systemApks/{versionCode}/variants',
              'httpMethod' => 'GET',
              'parameters' => array(
                'packageName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'versionCode' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}

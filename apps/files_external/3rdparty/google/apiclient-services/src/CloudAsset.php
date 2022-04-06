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
 * Service definition for CloudAsset (v1).
 *
 * <p>
 * The cloud asset API manages the history and inventory of cloud resources.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/asset-inventory/docs/quickstart" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class CloudAsset extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $assets;
  public $effectiveIamPolicies;
  public $feeds;
  public $operations;
  public $savedQueries;
  public $v1;

  /**
   * Constructs the internal representation of the CloudAsset service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://cloudasset.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'cloudasset';

    $this->assets = new CloudAsset\Resource\Assets(
        $this,
        $this->serviceName,
        'assets',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/assets',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assetTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'contentType' => [
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
                'readTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'relationshipTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->effectiveIamPolicies = new CloudAsset\Resource\EffectiveIamPolicies(
        $this,
        $this->serviceName,
        'effectiveIamPolicies',
        [
          'methods' => [
            'batchGet' => [
              'path' => 'v1/{+scope}/effectiveIamPolicies:batchGet',
              'httpMethod' => 'GET',
              'parameters' => [
                'scope' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'names' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->feeds = new CloudAsset\Resource\Feeds(
        $this,
        $this->serviceName,
        'feeds',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/feeds',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/feeds',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->operations = new CloudAsset\Resource\Operations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->savedQueries = new CloudAsset\Resource\SavedQueries(
        $this,
        $this->serviceName,
        'savedQueries',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/savedQueries',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'savedQueryId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/savedQueries',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
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
            ],'patch' => [
              'path' => 'v1/{+name}',
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
    $this->v1 = new CloudAsset\Resource\V1(
        $this,
        $this->serviceName,
        'v1',
        [
          'methods' => [
            'analyzeIamPolicy' => [
              'path' => 'v1/{+scope}:analyzeIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'scope' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'analysisQuery.accessSelector.permissions' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'analysisQuery.accessSelector.roles' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'analysisQuery.conditionContext.accessTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'analysisQuery.identitySelector.identity' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'analysisQuery.options.analyzeServiceAccountImpersonation' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'analysisQuery.options.expandGroups' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'analysisQuery.options.expandResources' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'analysisQuery.options.expandRoles' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'analysisQuery.options.outputGroupEdges' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'analysisQuery.options.outputResourceEdges' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'analysisQuery.resourceSelector.fullResourceName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'executionTimeout' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'savedAnalysisQuery' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'analyzeIamPolicyLongrunning' => [
              'path' => 'v1/{+scope}:analyzeIamPolicyLongrunning',
              'httpMethod' => 'POST',
              'parameters' => [
                'scope' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'analyzeMove' => [
              'path' => 'v1/{+resource}:analyzeMove',
              'httpMethod' => 'GET',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'destinationParent' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'batchGetAssetsHistory' => [
              'path' => 'v1/{+parent}:batchGetAssetsHistory',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assetNames' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'contentType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readTimeWindow.endTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readTimeWindow.startTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'relationshipTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'exportAssets' => [
              'path' => 'v1/{+parent}:exportAssets',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'searchAllIamPolicies' => [
              'path' => 'v1/{+scope}:searchAllIamPolicies',
              'httpMethod' => 'GET',
              'parameters' => [
                'scope' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assetTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'orderBy' => [
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
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'searchAllResources' => [
              'path' => 'v1/{+scope}:searchAllResources',
              'httpMethod' => 'GET',
              'parameters' => [
                'scope' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assetTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'orderBy' => [
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
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
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
class_alias(CloudAsset::class, 'Google_Service_CloudAsset');

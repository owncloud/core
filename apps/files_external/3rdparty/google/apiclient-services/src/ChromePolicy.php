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
 * Service definition for ChromePolicy (v1).
 *
 * <p>
 * The Chrome Policy API is a suite of services that allows Chrome
 * administrators to control the policies applied to their managed Chrome OS
 * devices and Chrome browsers.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://developers.google.com/chrome/policy" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class ChromePolicy extends \Google\Service
{
  /** See, edit, create or delete policies applied to Chrome OS and Chrome Browsers managed within your organization. */
  const CHROME_MANAGEMENT_POLICY =
      "https://www.googleapis.com/auth/chrome.management.policy";
  /** See policies applied to Chrome OS and Chrome Browsers managed within your organization. */
  const CHROME_MANAGEMENT_POLICY_READONLY =
      "https://www.googleapis.com/auth/chrome.management.policy.readonly";

  public $customers_policies;
  public $customers_policies_orgunits;
  public $customers_policySchemas;
  public $media;

  /**
   * Constructs the internal representation of the ChromePolicy service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://chromepolicy.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'chromepolicy';

    $this->customers_policies = new ChromePolicy\Resource\CustomersPolicies(
        $this,
        $this->serviceName,
        'policies',
        [
          'methods' => [
            'resolve' => [
              'path' => 'v1/{+customer}/policies:resolve',
              'httpMethod' => 'POST',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->customers_policies_orgunits = new ChromePolicy\Resource\CustomersPoliciesOrgunits(
        $this,
        $this->serviceName,
        'orgunits',
        [
          'methods' => [
            'batchInherit' => [
              'path' => 'v1/{+customer}/policies/orgunits:batchInherit',
              'httpMethod' => 'POST',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchModify' => [
              'path' => 'v1/{+customer}/policies/orgunits:batchModify',
              'httpMethod' => 'POST',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->customers_policySchemas = new ChromePolicy\Resource\CustomersPolicySchemas(
        $this,
        $this->serviceName,
        'policySchemas',
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
            ],'list' => [
              'path' => 'v1/{+parent}/policySchemas',
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
            ],
          ]
        ]
    );
    $this->media = new ChromePolicy\Resource\Media(
        $this,
        $this->serviceName,
        'media',
        [
          'methods' => [
            'upload' => [
              'path' => 'v1/{+customer}/policies/files:uploadPolicyFile',
              'httpMethod' => 'POST',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChromePolicy::class, 'Google_Service_ChromePolicy');

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
class Google_Service_ChromePolicy extends Google_Service
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://chromepolicy.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'chromepolicy';

    $this->customers_policies = new Google_Service_ChromePolicy_Resource_CustomersPolicies(
        $this,
        $this->serviceName,
        'policies',
        array(
          'methods' => array(
            'resolve' => array(
              'path' => 'v1/{+customer}/policies:resolve',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->customers_policies_orgunits = new Google_Service_ChromePolicy_Resource_CustomersPoliciesOrgunits(
        $this,
        $this->serviceName,
        'orgunits',
        array(
          'methods' => array(
            'batchInherit' => array(
              'path' => 'v1/{+customer}/policies/orgunits:batchInherit',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchModify' => array(
              'path' => 'v1/{+customer}/policies/orgunits:batchModify',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->customers_policySchemas = new Google_Service_ChromePolicy_Resource_CustomersPolicySchemas(
        $this,
        $this->serviceName,
        'policySchemas',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/{+parent}/policySchemas',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
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
    $this->media = new Google_Service_ChromePolicy_Resource_Media(
        $this,
        $this->serviceName,
        'media',
        array(
          'methods' => array(
            'upload' => array(
              'path' => 'v1/{+customer}/policies/files:uploadPolicyFile',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
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

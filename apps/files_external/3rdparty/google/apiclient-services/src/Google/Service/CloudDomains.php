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
 * Service definition for CloudDomains (v1beta1).
 *
 * <p>
 * Enables management and configuration of domain names.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/domains/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_CloudDomains extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects_locations;
  public $projects_locations_operations;
  public $projects_locations_registrations;
  
  /**
   * Constructs the internal representation of the CloudDomains service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://domains.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta1';
    $this->serviceName = 'domains';

    $this->projects_locations = new Google_Service_CloudDomains_Resource_ProjectsLocations(
        $this,
        $this->serviceName,
        'locations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta1/{+name}/locations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_operations = new Google_Service_CloudDomains_Resource_ProjectsLocationsOperations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta1/{+name}/operations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_registrations = new Google_Service_CloudDomains_Resource_ProjectsLocationsRegistrations(
        $this,
        $this->serviceName,
        'registrations',
        array(
          'methods' => array(
            'configureContactSettings' => array(
              'path' => 'v1beta1/{+registration}:configureContactSettings',
              'httpMethod' => 'POST',
              'parameters' => array(
                'registration' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'configureDnsSettings' => array(
              'path' => 'v1beta1/{+registration}:configureDnsSettings',
              'httpMethod' => 'POST',
              'parameters' => array(
                'registration' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'configureManagementSettings' => array(
              'path' => 'v1beta1/{+registration}:configureManagementSettings',
              'httpMethod' => 'POST',
              'parameters' => array(
                'registration' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'export' => array(
              'path' => 'v1beta1/{+name}:export',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getIamPolicy' => array(
              'path' => 'v1beta1/{+resource}:getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'options.requestedPolicyVersion' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta1/{+parent}/registrations',
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
            ),'patch' => array(
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'register' => array(
              'path' => 'v1beta1/{+parent}/registrations:register',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'resetAuthorizationCode' => array(
              'path' => 'v1beta1/{+registration}:resetAuthorizationCode',
              'httpMethod' => 'POST',
              'parameters' => array(
                'registration' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'retrieveAuthorizationCode' => array(
              'path' => 'v1beta1/{+registration}:retrieveAuthorizationCode',
              'httpMethod' => 'GET',
              'parameters' => array(
                'registration' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'retrieveRegisterParameters' => array(
              'path' => 'v1beta1/{+location}/registrations:retrieveRegisterParameters',
              'httpMethod' => 'GET',
              'parameters' => array(
                'location' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'domainName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'searchDomains' => array(
              'path' => 'v1beta1/{+location}/registrations:searchDomains',
              'httpMethod' => 'GET',
              'parameters' => array(
                'location' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'setIamPolicy' => array(
              'path' => 'v1beta1/{+resource}:setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'testIamPermissions' => array(
              'path' => 'v1beta1/{+resource}:testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
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

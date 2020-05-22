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
 * Service definition for CloudPrivateCatalog (v1beta1).
 *
 * <p>
 * Enable cloud users to discover enterprise catalogs and products in their
 * organizations.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/private-catalog/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_CloudPrivateCatalog extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $folders_catalogs;
  public $folders_products;
  public $folders_versions;
  public $organizations_catalogs;
  public $organizations_products;
  public $organizations_versions;
  public $projects_catalogs;
  public $projects_products;
  public $projects_versions;
  
  /**
   * Constructs the internal representation of the CloudPrivateCatalog service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://cloudprivatecatalog.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta1';
    $this->serviceName = 'cloudprivatecatalog';

    $this->folders_catalogs = new Google_Service_CloudPrivateCatalog_Resource_FoldersCatalogs(
        $this,
        $this->serviceName,
        'catalogs',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1beta1/{+resource}/catalogs:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
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
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->folders_products = new Google_Service_CloudPrivateCatalog_Resource_FoldersProducts(
        $this,
        $this->serviceName,
        'products',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1beta1/{+resource}/products:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
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
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->folders_versions = new Google_Service_CloudPrivateCatalog_Resource_FoldersVersions(
        $this,
        $this->serviceName,
        'versions',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1beta1/{+resource}/versions:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
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
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->organizations_catalogs = new Google_Service_CloudPrivateCatalog_Resource_OrganizationsCatalogs(
        $this,
        $this->serviceName,
        'catalogs',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1beta1/{+resource}/catalogs:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->organizations_products = new Google_Service_CloudPrivateCatalog_Resource_OrganizationsProducts(
        $this,
        $this->serviceName,
        'products',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1beta1/{+resource}/products:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
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
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->organizations_versions = new Google_Service_CloudPrivateCatalog_Resource_OrganizationsVersions(
        $this,
        $this->serviceName,
        'versions',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1beta1/{+resource}/versions:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
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
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_catalogs = new Google_Service_CloudPrivateCatalog_Resource_ProjectsCatalogs(
        $this,
        $this->serviceName,
        'catalogs',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1beta1/{+resource}/catalogs:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
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
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_products = new Google_Service_CloudPrivateCatalog_Resource_ProjectsProducts(
        $this,
        $this->serviceName,
        'products',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1beta1/{+resource}/products:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
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
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_versions = new Google_Service_CloudPrivateCatalog_Resource_ProjectsVersions(
        $this,
        $this->serviceName,
        'versions',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1beta1/{+resource}/versions:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
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
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
  }
}

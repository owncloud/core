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
 * Service definition for WebSecurityScanner (v1alpha).
 *
 * <p>
 * Scans your Compute and App Engine apps for common web vulnerabilities.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/security-scanner/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_WebSecurityScanner extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects_scanConfigs;
  public $projects_scanConfigs_scanRuns;
  public $projects_scanConfigs_scanRuns_crawledUrls;
  public $projects_scanConfigs_scanRuns_findingTypeStats;
  public $projects_scanConfigs_scanRuns_findings;
  
  /**
   * Constructs the internal representation of the WebSecurityScanner service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://websecurityscanner.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1alpha';
    $this->serviceName = 'websecurityscanner';

    $this->projects_scanConfigs = new Google_Service_WebSecurityScanner_Resource_ProjectsScanConfigs(
        $this,
        $this->serviceName,
        'scanConfigs',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1alpha/{+parent}/scanConfigs',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1alpha/{+parent}/scanConfigs',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
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
              ),
            ),'patch' => array(
              'path' => 'v1alpha/{+name}',
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
            ),'start' => array(
              'path' => 'v1alpha/{+name}:start',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_scanConfigs_scanRuns = new Google_Service_WebSecurityScanner_Resource_ProjectsScanConfigsScanRuns(
        $this,
        $this->serviceName,
        'scanRuns',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1alpha/{+parent}/scanRuns',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
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
              ),
            ),'stop' => array(
              'path' => 'v1alpha/{+name}:stop',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_scanConfigs_scanRuns_crawledUrls = new Google_Service_WebSecurityScanner_Resource_ProjectsScanConfigsScanRunsCrawledUrls(
        $this,
        $this->serviceName,
        'crawledUrls',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1alpha/{+parent}/crawledUrls',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
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
              ),
            ),
          )
        )
    );
    $this->projects_scanConfigs_scanRuns_findingTypeStats = new Google_Service_WebSecurityScanner_Resource_ProjectsScanConfigsScanRunsFindingTypeStats(
        $this,
        $this->serviceName,
        'findingTypeStats',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1alpha/{+parent}/findingTypeStats',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_scanConfigs_scanRuns_findings = new Google_Service_WebSecurityScanner_Resource_ProjectsScanConfigsScanRunsFindings(
        $this,
        $this->serviceName,
        'findings',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1alpha/{+parent}/findings',
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
  }
}

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
 * Service definition for JobService (v2).
 *
 * <p>
 * Cloud Talent Solution provides the capability to create, read, update, and
 * delete job postings, as well as search jobs based on keywords and filters.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/job-discovery/docs" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_JobService extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** Manage job postings. */
  const JOBS =
      "https://www.googleapis.com/auth/jobs";

  public $companies;
  public $companies_jobs;
  public $jobs;
  public $v2;
  
  /**
   * Constructs the internal representation of the JobService service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://jobs.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v2';
    $this->serviceName = 'jobs';

    $this->companies = new Google_Service_JobService_Resource_Companies(
        $this,
        $this->serviceName,
        'companies',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v2/companies',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v2/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v2/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2/companies',
              'httpMethod' => 'GET',
              'parameters' => array(
                'mustHaveOpenJobs' => array(
                  'location' => 'query',
                  'type' => 'boolean',
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
              'path' => 'v2/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateCompanyFields' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->companies_jobs = new Google_Service_JobService_Resource_CompaniesJobs(
        $this,
        $this->serviceName,
        'jobs',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2/{+companyName}/jobs',
              'httpMethod' => 'GET',
              'parameters' => array(
                'companyName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'includeJobsCount' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'idsOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'jobRequisitionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->jobs = new Google_Service_JobService_Resource_Jobs(
        $this,
        $this->serviceName,
        'jobs',
        array(
          'methods' => array(
            'batchDelete' => array(
              'path' => 'v2/jobs:batchDelete',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'create' => array(
              'path' => 'v2/jobs',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v2/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'disableFastProcess' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'deleteByFilter' => array(
              'path' => 'v2/jobs:deleteByFilter',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => 'v2/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'histogram' => array(
              'path' => 'v2/jobs:histogram',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'v2/jobs',
              'httpMethod' => 'GET',
              'parameters' => array(
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
                'idsOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'patch' => array(
              'path' => 'v2/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'v2/jobs:search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'searchForAlert' => array(
              'path' => 'v2/jobs:searchForAlert',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->v2 = new Google_Service_JobService_Resource_V2(
        $this,
        $this->serviceName,
        'v2',
        array(
          'methods' => array(
            'complete' => array(
              'path' => 'v2:complete',
              'httpMethod' => 'GET',
              'parameters' => array(
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'companyName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scope' => array(
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
                'languageCode' => array(
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

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

namespace Google\Service\BigQueryDataTransfer\Resource;

use Google\Service\BigQueryDataTransfer\BigquerydatatransferEmpty;
use Google\Service\BigQueryDataTransfer\EnrollDataSourcesRequest;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigquerydatatransferService = new Google\Service\BigQueryDataTransfer(...);
 *   $projects = $bigquerydatatransferService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * Enroll data sources in a user project. This allows users to create transfer
   * configurations for these data sources. They will also appear in the
   * ListDataSources RPC and as such, will appear in the [BigQuery
   * UI](https://console.cloud.google.com/bigquery), and the documents can be
   * found in the public guide for [BigQuery Web
   * UI](https://cloud.google.com/bigquery/bigquery-web-ui) and [Data Transfer
   * Service](https://cloud.google.com/bigquery/docs/working-with-transfers).
   * (projects.enrollDataSources)
   *
   * @param string $name The name of the project resource in the form:
   * `projects/{project_id}`
   * @param EnrollDataSourcesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BigquerydatatransferEmpty
   */
  public function enrollDataSources($name, EnrollDataSourcesRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('enrollDataSources', [$params], BigquerydatatransferEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_BigQueryDataTransfer_Resource_Projects');

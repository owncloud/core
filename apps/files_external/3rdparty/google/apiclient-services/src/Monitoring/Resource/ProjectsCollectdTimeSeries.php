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

namespace Google\Service\Monitoring\Resource;

use Google\Service\Monitoring\CreateCollectdTimeSeriesRequest;
use Google\Service\Monitoring\CreateCollectdTimeSeriesResponse;

/**
 * The "collectdTimeSeries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google\Service\Monitoring(...);
 *   $collectdTimeSeries = $monitoringService->collectdTimeSeries;
 *  </code>
 */
class ProjectsCollectdTimeSeries extends \Google\Service\Resource
{
  /**
   * Stackdriver Monitoring Agent only: Creates a new time series.This method is
   * only for use by the Stackdriver Monitoring Agent. Use
   * projects.timeSeries.create instead. (collectdTimeSeries.create)
   *
   * @param string $name The project
   * (https://cloud.google.com/monitoring/api/v3#project_name) in which to create
   * the time series. The format is: projects/[PROJECT_ID_OR_NUMBER]
   * @param CreateCollectdTimeSeriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CreateCollectdTimeSeriesResponse
   */
  public function create($name, CreateCollectdTimeSeriesRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], CreateCollectdTimeSeriesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsCollectdTimeSeries::class, 'Google_Service_Monitoring_Resource_ProjectsCollectdTimeSeries');

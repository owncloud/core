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

namespace Google\Service\Contactcenterinsights\Resource;

use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1ExportInsightsDataRequest;
use Google\Service\Contactcenterinsights\GoogleLongrunningOperation;

/**
 * The "insightsdata" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contactcenterinsightsService = new Google\Service\Contactcenterinsights(...);
 *   $insightsdata = $contactcenterinsightsService->insightsdata;
 *  </code>
 */
class ProjectsLocationsInsightsdata extends \Google\Service\Resource
{
  /**
   * Export insights data to a destination defined in the request body.
   * (insightsdata.export)
   *
   * @param string $parent Required. The parent resource to export data from.
   * @param GoogleCloudContactcenterinsightsV1ExportInsightsDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function export($parent, GoogleCloudContactcenterinsightsV1ExportInsightsDataRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('export', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsInsightsdata::class, 'Google_Service_Contactcenterinsights_Resource_ProjectsLocationsInsightsdata');

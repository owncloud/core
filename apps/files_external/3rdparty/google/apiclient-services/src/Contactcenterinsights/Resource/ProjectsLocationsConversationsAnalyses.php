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

use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1Analysis;
use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1ListAnalysesResponse;
use Google\Service\Contactcenterinsights\GoogleLongrunningOperation;
use Google\Service\Contactcenterinsights\GoogleProtobufEmpty;

/**
 * The "analyses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contactcenterinsightsService = new Google\Service\Contactcenterinsights(...);
 *   $analyses = $contactcenterinsightsService->analyses;
 *  </code>
 */
class ProjectsLocationsConversationsAnalyses extends \Google\Service\Resource
{
  /**
   * Creates an analysis. The long running operation is done when the analysis has
   * completed. (analyses.create)
   *
   * @param string $parent Required. The parent resource of the analysis.
   * @param GoogleCloudContactcenterinsightsV1Analysis $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudContactcenterinsightsV1Analysis $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes an analysis. (analyses.delete)
   *
   * @param string $name Required. The name of the analysis to delete.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets an analysis. (analyses.get)
   *
   * @param string $name Required. The name of the analysis to get.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContactcenterinsightsV1Analysis
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudContactcenterinsightsV1Analysis::class);
  }
  /**
   * Lists analyses. (analyses.listProjectsLocationsConversationsAnalyses)
   *
   * @param string $parent Required. The parent resource of the analyses.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter to reduce results to a specific subset.
   * Useful for querying conversations with specific properties.
   * @opt_param int pageSize The maximum number of analyses to return in the
   * response. If this value is zero, the service will select a default size. A
   * call might return fewer objects than requested. A non-empty `next_page_token`
   * in the response indicates that more data is available.
   * @opt_param string pageToken The value returned by the last
   * `ListAnalysesResponse`; indicates that this is a continuation of a prior
   * `ListAnalyses` call and the system should return the next page of data.
   * @return GoogleCloudContactcenterinsightsV1ListAnalysesResponse
   */
  public function listProjectsLocationsConversationsAnalyses($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudContactcenterinsightsV1ListAnalysesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConversationsAnalyses::class, 'Google_Service_Contactcenterinsights_Resource_ProjectsLocationsConversationsAnalyses');

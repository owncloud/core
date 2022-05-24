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

use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1ListViewsResponse;
use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1View;
use Google\Service\Contactcenterinsights\GoogleProtobufEmpty;

/**
 * The "views" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contactcenterinsightsService = new Google\Service\Contactcenterinsights(...);
 *   $views = $contactcenterinsightsService->views;
 *  </code>
 */
class ProjectsLocationsViews extends \Google\Service\Resource
{
  /**
   * Creates a view. (views.create)
   *
   * @param string $parent Required. The parent resource of the view. Required.
   * The location to create a view for. Format: `projects//locations/` or
   * `projects//locations/`
   * @param GoogleCloudContactcenterinsightsV1View $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContactcenterinsightsV1View
   */
  public function create($parent, GoogleCloudContactcenterinsightsV1View $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudContactcenterinsightsV1View::class);
  }
  /**
   * Deletes a view. (views.delete)
   *
   * @param string $name Required. The name of the view to delete.
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
   * Gets a view. (views.get)
   *
   * @param string $name Required. The name of the view to get.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContactcenterinsightsV1View
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudContactcenterinsightsV1View::class);
  }
  /**
   * Lists views. (views.listProjectsLocationsViews)
   *
   * @param string $parent Required. The parent resource of the views.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of views to return in the
   * response. If this value is zero, the service will select a default size. A
   * call may return fewer objects than requested. A non-empty `next_page_token`
   * in the response indicates that more data is available.
   * @opt_param string pageToken The value returned by the last
   * `ListViewsResponse`; indicates that this is a continuation of a prior
   * `ListViews` call and the system should return the next page of data.
   * @return GoogleCloudContactcenterinsightsV1ListViewsResponse
   */
  public function listProjectsLocationsViews($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudContactcenterinsightsV1ListViewsResponse::class);
  }
  /**
   * Updates a view. (views.patch)
   *
   * @param string $name Immutable. The resource name of the view. Format:
   * projects/{project}/locations/{location}/views/{view}
   * @param GoogleCloudContactcenterinsightsV1View $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated.
   * @return GoogleCloudContactcenterinsightsV1View
   */
  public function patch($name, GoogleCloudContactcenterinsightsV1View $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudContactcenterinsightsV1View::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsViews::class, 'Google_Service_Contactcenterinsights_Resource_ProjectsLocationsViews');

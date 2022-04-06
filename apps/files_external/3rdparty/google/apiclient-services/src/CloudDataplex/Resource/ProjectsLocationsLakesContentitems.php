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

namespace Google\Service\CloudDataplex\Resource;

use Google\Service\CloudDataplex\DataplexEmpty;
use Google\Service\CloudDataplex\GoogleCloudDataplexV1Content;
use Google\Service\CloudDataplex\GoogleCloudDataplexV1ListContentResponse;

/**
 * The "contentitems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataplexService = new Google\Service\CloudDataplex(...);
 *   $contentitems = $dataplexService->contentitems;
 *  </code>
 */
class ProjectsLocationsLakesContentitems extends \Google\Service\Resource
{
  /**
   * Create a content. (contentitems.create)
   *
   * @param string $parent Required. The resource name of the parent lake:
   * projects/{project_id}/locations/{location_id}/lakes/{lake_id}
   * @param GoogleCloudDataplexV1Content $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Only validate the request, but do not
   * perform mutations. The default is false.
   * @return GoogleCloudDataplexV1Content
   */
  public function create($parent, GoogleCloudDataplexV1Content $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDataplexV1Content::class);
  }
  /**
   * Delete a content. (contentitems.delete)
   *
   * @param string $name Required. The resource name of the content: projects/{pro
   * ject_id}/locations/{location_id}/lakes/{lake_id}/content/{content_id}
   * @param array $optParams Optional parameters.
   * @return DataplexEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DataplexEmpty::class);
  }
  /**
   * Get a content resource. (contentitems.get)
   *
   * @param string $name Required. The resource name of the content: projects/{pro
   * ject_id}/locations/{location_id}/lakes/{lake_id}/content/{content_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Optional. Specify content view to make a partial
   * request.
   * @return GoogleCloudDataplexV1Content
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDataplexV1Content::class);
  }
  /**
   * List content. (contentitems.listProjectsLocationsLakesContentitems)
   *
   * @param string $parent Required. The resource name of the parent lake:
   * projects/{project_id}/locations/{location_id}/lakes/{lake_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter request. Filters are case-
   * sensitive. The following formats are supported:labels.key1 = "value1"
   * labels:key1 type = "NOTEBOOK" type = "SQL_SCRIPT"These restrictions can be
   * coinjoined with AND, OR and NOT conjunctions.
   * @opt_param int pageSize Optional. Maximum number of content to return. The
   * service may return fewer than this value. If unspecified, at most 10 content
   * will be returned. The maximum value is 1000; values above 1000 will be
   * coerced to 1000.
   * @opt_param string pageToken Optional. Page token received from a previous
   * ListContent call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to ListContent must match the call
   * that provided the page token.
   * @return GoogleCloudDataplexV1ListContentResponse
   */
  public function listProjectsLocationsLakesContentitems($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDataplexV1ListContentResponse::class);
  }
  /**
   * Update a content. Only supports full resource update. (contentitems.patch)
   *
   * @param string $name Output only. The relative resource name of the content,
   * of the form: projects/{project_id}/locations/{location_id}/lakes/{lake_id}/co
   * ntent/{content_id}
   * @param GoogleCloudDataplexV1Content $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update.
   * @opt_param bool validateOnly Optional. Only validate the request, but do not
   * perform mutations. The default is false.
   * @return GoogleCloudDataplexV1Content
   */
  public function patch($name, GoogleCloudDataplexV1Content $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDataplexV1Content::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsLakesContentitems::class, 'Google_Service_CloudDataplex_Resource_ProjectsLocationsLakesContentitems');

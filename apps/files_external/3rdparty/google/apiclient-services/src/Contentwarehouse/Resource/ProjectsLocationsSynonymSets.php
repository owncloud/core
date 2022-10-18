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

namespace Google\Service\Contentwarehouse\Resource;

use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1ListSynonymSetsResponse;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1SynonymSet;
use Google\Service\Contentwarehouse\GoogleProtobufEmpty;

/**
 * The "synonymSets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentwarehouseService = new Google\Service\Contentwarehouse(...);
 *   $synonymSets = $contentwarehouseService->synonymSets;
 *  </code>
 */
class ProjectsLocationsSynonymSets extends \Google\Service\Resource
{
  /**
   * Creates a SynonymSet for a single context. Throws an ALREADY_EXISTS exception
   * if a synonymset already exists for the context. (synonymSets.create)
   *
   * @param string $parent Required. The parent name. Format:
   * projects/{project_number}/locations/{location}.
   * @param GoogleCloudContentwarehouseV1SynonymSet $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1SynonymSet
   */
  public function create($parent, GoogleCloudContentwarehouseV1SynonymSet $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudContentwarehouseV1SynonymSet::class);
  }
  /**
   * Deletes a SynonymSet for a given context. Throws a NOT_FOUND exception if the
   * SynonymSet is not found. (synonymSets.delete)
   *
   * @param string $name Required. The name of the synonymSet to delete Format:
   * projects/{project_number}/locations/{location}/synonymSets/{context}.
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
   * Gets a SynonymSet for a particular context. Throws a NOT_FOUND exception if
   * the Synonymset does not exist (synonymSets.get)
   *
   * @param string $name Required. The name of the synonymSet to retrieve Format:
   * projects/{project_number}/locations/{location}/synonymSets/{context}.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1SynonymSet
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudContentwarehouseV1SynonymSet::class);
  }
  /**
   * Returns all SynonymSets (for all contexts) for the specified location.
   * (synonymSets.listProjectsLocationsSynonymSets)
   *
   * @param string $parent Required. The parent name. Format:
   * projects/{project_number}/locations/{location}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of synonymSets to return. The
   * service may return fewer than this value. If unspecified, at most 50 rule
   * sets will be returned. The maximum value is 1000; values above 1000 will be
   * coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListSynonymSets` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListSynonymSets` must match the
   * call that provided the page token.
   * @return GoogleCloudContentwarehouseV1ListSynonymSetsResponse
   */
  public function listProjectsLocationsSynonymSets($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudContentwarehouseV1ListSynonymSetsResponse::class);
  }
  /**
   * Remove the existing SynonymSet for the context and replaces it with a new
   * one. Throws a NOT_FOUND exception if the SynonymSet is not found.
   * (synonymSets.patch)
   *
   * @param string $name Required. The name of the synonymSet to update Format:
   * projects/{project_number}/locations/{location}/synonymSets/{context}.
   * @param GoogleCloudContentwarehouseV1SynonymSet $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1SynonymSet
   */
  public function patch($name, GoogleCloudContentwarehouseV1SynonymSet $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudContentwarehouseV1SynonymSet::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsSynonymSets::class, 'Google_Service_Contentwarehouse_Resource_ProjectsLocationsSynonymSets');
